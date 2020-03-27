<?php

namespace shop\repositories\other\contacts;

use shop\entities\other\contacts\Phone;
use shop\repositories\NotFoundException;

class PhoneRepository
{
    public function get($id): Phone
    {
        if (!$phone = Phone::findOne($id)) {
            throw new NotFoundException('Phone is not found.');
        }
        return $phone;
    }

    public function save(Phone $phone): void
    {
        if (!$phone->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Phone $phone): void
    {
        if (!$phone->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }

}