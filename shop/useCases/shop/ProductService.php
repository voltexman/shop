<?php

namespace shop\useCases\shop;

use shop\forms\shop\AnswerReviewForm;
use shop\forms\shop\ReviewForm;
use shop\repositories\shop\ProductRepository;
use shop\repositories\shop\ReviewRepository;
use shop\useCases\shop\viewedProducts\ViewedProduct;
use shop\useCases\shop\viewedProducts\ViewedProducts;


class ProductService
{
    private $products;
    private $reviews;
    private $viewedProducts;


    public function __construct(ProductRepository $products, ReviewRepository $reviews, ViewedProducts $viewedProducts)
    {
        $this->products = $products;
        $this->reviews = $reviews;
        $this->viewedProducts = $viewedProducts;
    }

    public function getViewedProducts(): ViewedProducts
    {
        return $this->viewedProducts;
    }


    public function addViewedProduct($productId): void
    {
        $product = $this->products->get($productId);
        $this->viewedProducts->add(new ViewedProduct($product));
    }


    public function clearViewedProducts(): void
    {
        $this->viewedProducts->clear();
    }


    public function addReview($productId, ReviewForm $form): void
    {
        $product = $this->products->get($productId);
        $product->addReview(
            $form->userId,
            $form->vote,
            $form->text,
        );
        $this->products->save($product);
    }


    public function addAnswerReview(AnswerReviewForm $form): void
    {
        $review = $this->reviews->get($form->reviewId);
        $review->addAnswer(
            $form->userId,
            $form->text,
            );
        $this->reviews->save($review);
    }

}