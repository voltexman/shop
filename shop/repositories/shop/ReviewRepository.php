<?php

namespace shop\repositories\shop;

use shop\entities\shop\product\Review;
use shop\repositories\NotFoundException;

class ReviewRepository
{
    public function get($id): Review
    {
        if (!$review = Review::findOne($id)) {
            throw new NotFoundException('Review is not found.');
        }
        return $review;
    }

    public function save(Review $review): void
    {
        if (!$review->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Review $review): void
    {
        if (!$review->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}