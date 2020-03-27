<?php

namespace shop\useCases\manage\shop;


use shop\forms\manage\shop\product\AnswerReviewEditForm;
use shop\forms\manage\shop\product\ReviewEditForm;
use shop\repositories\shop\ReviewRepository;

class ReviewManageService
{
    private $reviews;

    public function __construct(ReviewRepository $reviews)
    {
        $this->reviews = $reviews;
    }

    public function activate($id): void
    {
        $review = $this->reviews->get($id);
        $review->activate();
        $this->reviews->save($review);
    }

    public function draft($id): void
    {
        $review = $this->reviews->get($id);
        $review->draft();
        $this->reviews->save($review);
    }

    public function remove($id): void
    {
        $review = $this->reviews->get($id);
        $this->reviews->remove($review);
    }

    public function edit($id, ReviewEditForm $form): void
    {
        $review = $this->reviews->get($id);
        $review->edit($form->text);
        $this->reviews->save($review);
    }


    public function addAnswer($id, $userId, AnswerReviewEditForm $form): void
    {
        $review = $this->reviews->get($id);
        $review->addAnswer($userId, $form->text);
        $this->reviews->save($review);
    }


    public function editAnswer($id, $answerId, AnswerReviewEditForm $form): void
    {
        $review = $this->reviews->get($id);
        $review->editAnswer($answerId, $form->text);
        $this->reviews->save($review);
    }


    public function removeAnswer($id, $answerId): void
    {
        $review = $this->reviews->get($id);
        $review->removeAnswer($answerId);
        $this->reviews->save($review);
    }




}