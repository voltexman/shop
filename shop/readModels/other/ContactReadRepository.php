<?php

namespace shop\readModels\other;


use shop\entities\other\contacts\Soc;
use shop\entities\other\contacts\Email;
use shop\entities\other\contacts\Address;
use shop\entities\other\AboutUs;

class ContactReadRepository
{

    public function getSocs(): array
    {
        return Soc::find()->all();
    }

    public function getEmail(): Email
    {
        return Email::findOne(1);
    }

    public function getAddress(): Address
    {
        return Address::findOne(1);
    }

    public function getAboutUs(): AboutUs
    {
        return AboutUs::findOne(1);
    }

}