<?php

namespace shop\useCases\manage\other\contacts;


use shop\entities\other\contacts\Phone;
use shop\repositories\other\contacts\PhoneRepository;
use shop\forms\manage\other\contacts\PhoneForm;

class PhoneManageService
{
    private $repository;


    public function __construct(PhoneRepository $repository)
    {
        $this->repository = $repository;
    }



    public function create (PhoneForm $form): Phone
    {
        $phone = Phone::create($form->text);
        $this->repository->save($phone);
        return $phone;
    }



    public function edit($id, PhoneForm $form): Phone
    {
        $phone = $this->repository->get($id);
        $phone->edit($form->text);
        $this->repository->save($phone);
        return $phone;
    }



    public function remove($id): void
    {
        $phone = $this->repository->get($id);
        $this->repository->remove($phone);
    }
}