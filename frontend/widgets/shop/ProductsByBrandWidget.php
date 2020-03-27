<?php

namespace frontend\widgets\shop;

use shop\readModels\shop\ProductReadRepository;
use yii\base\Widget;

class ProductsByBrandWidget extends Widget
{
    public $limit;
    public $brand;
    public $product_id;

    private $repository;

    public function __construct(ProductReadRepository $repository, $config = [])
    {
        parent::__construct($config);
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->render('products-by-brand', [
            'products' => $this->repository->getProductsByBrand($this->limit, $this->brand, $this->product_id)
        ]);
    }
}