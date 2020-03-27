<?php

namespace shop\useCases\manage\other;


use shop\forms\manage\other\AboutUsForm;
use shop\repositories\other\AboutUsRepository;

class AboutUsManageService
{
    private $repository;

    public function __construct(AboutUsRepository $repository)
    {
        $this->repository = $repository;
    }


    public function edit($id, AboutUsForm $form): void
    {
        $aboutUs = $this->repository->get($id);
        $aboutUs->edit($form->title, $form->description);
        $this->repository->save($aboutUs);
    }


}