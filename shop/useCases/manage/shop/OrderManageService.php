<?php

namespace shop\useCases\manage\shop;

use shop\entities\shop\order\CustomerData;
use shop\forms\manage\shop\order\OrderEditForm;
use shop\repositories\shop\OrderRepository;

class OrderManageService
{
    private $orders;

    public function __construct(OrderRepository $orders)
    {
        $this->orders = $orders;
    }



    public function edit($id, OrderEditForm $form): void
    {
        $order = $this->orders->get($id);

        $order->edit($form->status);

        $this->orders->save($order);
    }



    public function remove($id): void
    {
        $order = $this->orders->get($id);
        $this->orders->remove($order);
    }
}