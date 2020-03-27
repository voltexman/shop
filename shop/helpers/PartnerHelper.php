<?php

namespace shop\helpers;

use shop\entities\other\Partner;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class PartnerHelper
{
    public static function statusList(): array
    {
        return [
            Partner::STATUS_DRAFT => 'Не активный',
            Partner::STATUS_ACTIVE => 'Активный',
        ];
    }




    public static function statusName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status): string
    {
        switch ($status) {
            case Partner::STATUS_DRAFT:
                $class = 'label label-default';
                break;
            case Partner::STATUS_ACTIVE:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }



    public static function getDate($date)
    {
        return Yii::$app->formatter->asDate($date, 'php:d.m.Y'); // 20.02.2014
    }


}