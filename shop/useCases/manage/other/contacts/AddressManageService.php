<?php

namespace shop\useCases\manage\other\contacts;


use shop\entities\other\contacts\Address;
use shop\forms\manage\other\contacts\AddressForm;
use shop\repositories\other\contacts\AddressRepository;

class AddressManageService
{
    private $repository;


    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
    }


    public function edit($id, AddressForm $form): Address
    {
        $address = $this->repository->get($id);
        $address->edit($form->text);
        $this->repository->save($address);
        return $address;
    }

}