<?php

namespace shop\entities\shop\order\events;

use shop\entities\shop\order\Order;

class OrderCreateRequested
{
    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}