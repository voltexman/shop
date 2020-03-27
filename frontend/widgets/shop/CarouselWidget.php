<?php

namespace frontend\widgets\shop;

use shop\readModels\other\CarouselReadRepository;
use yii\base\Widget;

class CarouselWidget extends Widget
{
    public $limit;

    private $repository;

    public function __construct(CarouselReadRepository $repository, $config = [])
    {
        parent::__construct($config);
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->render('carousel', [
            'carousel' => $this->repository->getCarouselItems($this->limit)
        ]);
    }
}