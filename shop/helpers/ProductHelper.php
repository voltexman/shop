<?php

namespace shop\helpers;

use shop\entities\shop\product\Product;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ProductHelper
{
    public static function statusList(): array
    {
        return [
            Product::STATUS_DRAFT => 'Не активный',
            Product::STATUS_ACTIVE => 'Активный',
        ];
    }

    public static function labelList(): array
    {
        return [
            Product::LABEL_NOT_LABEL => 'Нет',
            Product::LABEL_NEW => 'Новинка',
            Product::LABEL_HIT => 'Топ продаж',
        ];
    }


    public static function labelListForSearch(): array
    {
        return [
            Product::LABEL_NEW => 'Новинка',
            Product::LABEL_HIT => 'Топ продаж',
        ];
    }


    public static function labelName($label):string
    {
        return ArrayHelper::getValue(self::labelList(), $label);
    }


    public static function showLabel($label)
    {
        switch ($label) {
            case Product::LABEL_NEW:
                $labelBlock = '<div class="stiker stiker-new">' . self::labelName($label) . ' </div>';
                break;
            case Product::LABEL_HIT:
                $labelBlock = '<div class="stiker main-sale">' . self::labelName($label) . ' </div>';
                break;
            default:
                $labelBlock = '<div class="stiker sale-new"> Акция </div>';
        }
        return $labelBlock;
    }



    public static function statusLabel($status): string
    {
        switch ($status) {
            case Product::STATUS_DRAFT:
                $class = 'label label-default';
                break;
            case Product::STATUS_ACTIVE:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }


    public static function showInIndexName($bool)
    {
        return $bool ? 'Да' : 'Нет';
    }


    public static function showDate($date)
    {
        return Yii::$app->formatter->asDate($date, 'php:d.m.Y'); // 20.02.2014
    }

}