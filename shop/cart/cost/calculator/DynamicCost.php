<?php

namespace shop\cart\cost\calculator;

use shop\cart\cost\Cost;


class DynamicCost implements CalculatorInterface
{
    private $next;

    public function __construct(CalculatorInterface $next)
    {
        $this->next = $next;
    }

    public function getCost(array $items): Cost
    {
        $cost = $this->next->getCost($items);

        return $cost;
    }
}