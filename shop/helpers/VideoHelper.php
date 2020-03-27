<?php

namespace shop\helpers;

use shop\entities\other\Video;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class VideoHelper
{
    public static function statusList(): array
    {
        return [
            Video::STATUS_DRAFT => 'Не активный',
            Video::STATUS_ACTIVE => 'Активный',
        ];
    }




    public static function statusName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }



    public static function statusLabel($status): string
    {
        switch ($status) {
            case Video::STATUS_DRAFT:
                $class = 'label label-default';
                break;
            case Video::STATUS_ACTIVE:
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