<?php

namespace shop\entities\shop\product\events;

use shop\entities\shop\product\Product;

class ProductAppearedInStock
{
    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
}