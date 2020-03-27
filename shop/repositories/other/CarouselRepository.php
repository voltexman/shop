<?php

namespace shop\repositories\other;

use shop\entities\other\carousel\Carousel;
use shop\repositories\NotFoundException;

class CarouselRepository
{
    public function get($id): Carousel
    {
        if (!$carousel = Carousel::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $carousel;
    }


    public function save(Carousel $carousel): void
    {
        if (!$carousel->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Carousel $carousel): void
    {
        if (!$carousel->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}