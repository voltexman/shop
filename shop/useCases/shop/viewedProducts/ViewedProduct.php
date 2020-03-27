<?php

namespace shop\useCases\shop\viewedProducts;

use shop\entities\shop\product\Product;

class ViewedProduct
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getId(): string
    {
        return md5(serialize([$this->product->id]));
    }

    public function getProductId(): int
    {
        return $this->product->id;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

}