<?php

namespace shop\helpers;

use shop\entities\other\contacts\Email;
use shop\entities\other\contacts\Phone;
use shop\entities\other\contacts\Address;
use shop\entities\other\contacts\Soc;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ServicesHelper
{

    public static function getPhonesList() :array
    {
        return Phone::find()->all();
    }


    public static function getEmailsList() :array
    {
        return Email::find()->all();
    }


    public static function getAddressesList() :array
    {
        return Address::find()->all();
    }


    public static function getSocByType($type): Soc
    {
        return Soc::find()->where(['soc_type' => $type])->one();
    }


}