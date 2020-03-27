<?php

namespace shop\repositories\shop;

use shop\dispatchers\SimpleEventDispatcher;
use shop\entities\shop\order\Order;
use shop\repositories\NotFoundException;

class OrderRepository
{

    private $dispatcher;
    public function __construct(SimpleEventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }


    public function get($id): Order
    {
        if (!$order = Order::findOne($id)) {
            throw new NotFoundException('Order is not found.');
        }
        return $order;
    }

    public function save(Order $order): void
    {
        if (!$order->save()) {
            throw new \RuntimeException('Saving error.');
        }
        $this->dispatcher->dispatchAll($order->releaseEvents());
    }

    public function remove(Order $order): void
    {
        if (!$order->delete()) {
            throw new \RuntimeException('Removing error.');
        }
        $this->dispatcher->dispatchAll($order->releaseEvents());
    }
}