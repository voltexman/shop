<?php

namespace shop\repositories\other;


use shop\entities\other\DeliveryAndPayment;
use shop\repositories\NotFoundException;

class DeliveryAndPaymentRepository
{
    public function get($id): DeliveryAndPayment
    {
        if (!$deliveryAndPayment = DeliveryAndPayment::findOne($id)) {
            throw new NotFoundException('OurService is not found.');
        }
        return $deliveryAndPayment;
    }

    public function save(DeliveryAndPayment $deliveryAndPayment): void
    {
        if (!$deliveryAndPayment->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(DeliveryAndPayment $deliveryAndPayment): void
    {
        if (!$deliveryAndPayment->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}