<?php

namespace shop\helpers;

use shop\entities\shop\product\Review;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ReviewHelper
{

    public static function statusList(): array
    {
        return [
            '0' => 'Не активный',
            '1' => 'Активный',
        ];
    }

    public static function typeList(): array
    {
        return [
            Review::TYPE_REVIEW  => 'Отзыв',
            Review::TYPE_COMMENT => 'Комментарий',
        ];
    }


    public static function statusName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status): string
    {
        switch ($status) {
            case '1':
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