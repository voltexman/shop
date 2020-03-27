<?php

namespace shop\cart\cost;

final class Cost
{
    private $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }


    public function getOrigin(): float
    {
        return $this->value;
    }

    public function getTotal(): float
    {
        return $this->value;
    }

}