<?php

namespace shop\useCases\manage\other;


use shop\entities\other\carousel\Carousel;
use shop\forms\manage\other\carousel\CarouselForm;
use shop\repositories\other\CarouselRepository;

class CarouselManageService
{
    private $repository;

    public function __construct(
        CarouselRepository $repository
    )
    {
        $this->repository = $repository;
    }


    public function create(CarouselForm $form): Carousel
    {
        $carouselItem = Carousel::create(
            $form->title,
            $form->link
        );

        if ($form->image) {
            $carouselItem->addPhoto($form->image);
        }

        $this->repository->save($carouselItem);
        return $carouselItem;
    }


    public function edit($id, CarouselForm $form): void
    {
        $carouselItem = $this->repository->get($id);

        $carouselItem->edit(
            $form->title,
            $form->link
        );

        if ($form->image) {
            $carouselItem->addPhoto($form->image);
        }
        $this->repository->save($carouselItem);
    }



    public function removePhoto($id): void
    {
        $carouselItem = $this->repository->get($id);
        $carouselItem->removePhoto();
        $this->repository->save($carouselItem);
    }


    public function remove($id): void
    {
        $carouselItem = $this->repository->get($id);
        $this->repository->remove($carouselItem);
    }


}