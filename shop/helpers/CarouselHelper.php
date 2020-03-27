<?php

namespace shop\helpers;

use shop\entities\other\Carousel;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class CarouselHelper
{


    public static function statusList(): array
    {
        return [
            Carousel::STATUS_DRAFT => 'Не активный',
            Carousel::STATUS_ACTIVE => 'Активный',
        ];
    }



    public static function statusName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }


    public static function statusLabel($status): string
    {
        switch ($status) {
            case Carousel::STATUS_DRAFT:
                $class = 'label label-default';
                break;
            case Carousel::STATUS_ACTIVE:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }



}