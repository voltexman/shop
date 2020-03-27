<?php

namespace shop\readModels\other;


use shop\entities\other\carousel\Carousel;

class CarouselReadRepository
{

    public function getCarouselItems($limit): array
    {
        return Carousel::find()->limit($limit)->all();
    }



}