<?php

namespace shop\repositories\other\contacts;

use shop\entities\other\contacts\Address;
use shop\repositories\NotFoundException;

class AddressRepository
{
    public function get($id): Address
    {
        if (!$address = Address::findOne($id)) {
            throw new NotFoundException('Address is not found.');
        }
        return $address;
    }

    public function save(Address $address): void
    {
        if (!$address->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Address $address): void
    {
        if (!$address->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }

}