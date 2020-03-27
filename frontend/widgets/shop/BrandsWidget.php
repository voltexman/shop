<?php

namespace frontend\widgets\shop;

use shop\readModels\shop\BrandReadRepository;
use yii\base\Widget;

class BrandsWidget extends Widget
{
    public $limit;

    private $repository;

    public function __construct(BrandReadRepository $repository, $config = [])
    {
        parent::__construct($config);
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->render('brands-show-in-index', [
            'brands' => $this->repository->getBrandsWishShowInIndex($this->limit)
        ]);
    }
}