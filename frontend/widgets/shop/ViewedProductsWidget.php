<?php

namespace frontend\widgets\shop;

use shop\readModels\shop\ProductReadRepository;
use shop\useCases\shop\viewedProducts\ViewedProducts;
use Yii;
use yii\base\Widget;

class ViewedProductsWidget extends Widget
{


    private $repository;

    public function __construct(ProductReadRepository $repository, $config = [])
    {
        parent::__construct($config);
        $this->repository = $repository;
    }


    public function run()
    {
        /** @var  $viewedProducts ViewedProducts */
        $viewedProducts = Yii::$container->get(ViewedProducts::class);

//        $viewedProducts->clear();


        $products = [];

        if (!empty($viewedProducts->getItems())){
            foreach ($viewedProducts->getItems() as $viewedProduct){
                $products[] = $viewedProduct->getProduct();

            }
        }


        return $this->render('viewed-products', [
            'products' => $products,
        ]);
    }
}

