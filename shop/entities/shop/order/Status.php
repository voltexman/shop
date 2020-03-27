<?php

namespace shop\entities\shop\order;

class Status
{
    const NEW = 1;
    const PROCESSING = 2;
    const PAID = 3;
    const SENT = 4;
    const COMPLETED = 5;
    const CANCELLED = 6;
    const CANCELLED_BY_CUSTOMER = 7;


    public $value;
    public $created_at;

    public function __construct($value, $created_at)
    {
        $this->value = $value;
        $this->created_at = $created_at;
    }
}