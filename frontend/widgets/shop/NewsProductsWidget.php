<?php

namespace frontend\widgets\shop;

use shop\readModels\shop\ProductReadRepository;
use yii\base\Widget;

class NewsProductsWidget extends Widget
{
    public $limit;

    private $repository;

    public function __construct(ProductReadRepository $repository, $config = [])
    {
        parent::__construct($config);
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->render('news-products', [
            'products' => $this->repository->getNewsProducts($this->limit),
        ]);
    }
}

