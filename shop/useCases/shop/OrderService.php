<?php

namespace shop\useCases\shop;

use shop\cart\Cart;
use shop\cart\CartItem;
use shop\entities\shop\order\CustomerData;
use shop\entities\shop\order\Order;
use shop\entities\shop\order\OrderItem;
use shop\forms\shop\order\OrderForm;
use shop\repositories\shop\OrderRepository;
use shop\repositories\shop\ProductRepository;
use shop\services\TransactionManager;

class OrderService
{
    private $cart;
    private $orders;
    private $productRepository;
    private $transaction;

    public function __construct(
        Cart $cart,
        OrderRepository $orders,
        ProductRepository $productRepository,
        TransactionManager $transaction
    )
    {
        $this->cart = $cart;
        $this->orders = $orders;
        $this->productRepository = $productRepository;
        $this->transaction = $transaction;
    }

    public function checkout(OrderForm $form): Order
    {

        $products = [];
        $items = [];

        foreach ($this->cart->getItems() as $item){
            /** @var $item CartItem */
            $product = $item->getProduct();
            $product->checkout($item->getModificationId(), $item->getQuantity());
            $products[] = $product;
            $items[] = OrderItem::create(
                $product,
                $item->getModificationId(),
                $item->getPrice(),
                $item->getQuantity(),
                );
        }

        $order = Order::create(
            $form->delivery_method,
            new CustomerData(
                $form->customer->phone,
                $form->customer->first_name,
                $form->customer->last_name,
                $form->customer->city,
                $form->customer->department_post,
            ),
            $items,
            $this->cart->getCost()->getTotal(),
            $form->note
        );


        $this->transaction->wrap(function () use ($order, $products) {
            $this->orders->save($order);
            foreach ($products as $product) {
                $this->productRepository->save($product);
            }
            $this->cart->clear();
        });

        return $order;
    }
}