<?php

namespace shop\useCases\manage\other;



use shop\forms\manage\other\GuaranteeForm;
use shop\repositories\other\GuaranteeRepository;

class GuaranteeManageService
{
    private $repository;

    public function __construct(GuaranteeRepository $repository)
    {
        $this->repository = $repository;
    }


    public function edit($id, GuaranteeForm $form): void
    {
        $aboutUs = $this->repository->get($id);
        $aboutUs->edit($form->title, $form->description);
        $this->repository->save($aboutUs);
    }


}