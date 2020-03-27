<?php

namespace shop\helpers;

use shop\entities\other\contacts\Address;
use shop\entities\other\contacts\Soc;
use shop\entities\other\contacts\Email;
use shop\entities\other\contacts\Phone;
use Yii;


class ContactHelper
{

    /**
     * @return Soc[]|null
     */
    public static function getSocs()
    {
        return Yii::$app->cache->getOrSet('socs', function () {
            return Soc::find()->all();
        },1200);
    }


    /**
     * @return Phone[]|null
     */
    public static function getPhones()
    {
        return Yii::$app->cache->getOrSet('phones', function () {
            return Phone::find()->all();
        },1200);
    }


    /**
     * @param string $name
     * @return bool|Soc
     */
    public static function getSocByName(string $name)
    {
        $socs = self::getSocs();
        foreach (self::getSocs() as $i => $soc){
            if ($soc->name == $name){
                return $socs[$i];
            }
        }
        return false;
    }

    /**
     * @return Email
     */
    public static function getEmail(): Email
    {
        return Email::findOne(1);
    }

    /**
     * @return Address
     */
    public static function getAddress(): Address
    {
        return Address::findOne(1);
    }



}