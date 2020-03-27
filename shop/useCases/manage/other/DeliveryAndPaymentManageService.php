<?php

namespace shop\useCases\manage\other;


use shop\forms\manage\other\DeliveryAndPaymentForm;
use shop\repositories\other\DeliveryAndPaymentRepository;

class DeliveryAndPaymentManageService
{
    private $repository;


    public function __construct(DeliveryAndPaymentRepository $repository){
        $this->repository = $repository;
    }


    public function edit($id, DeliveryAndPaymentForm $form): void
    {
        $deliveryAndPayment = $this->repository->get($id);
        $deliveryAndPayment->edit($form->title, $form->description,);
        $this->repository->save($deliveryAndPayment);
    }

}