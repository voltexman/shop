<?php

namespace shop\helpers;


use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use shop\entities\shop\CallMeasurer;

class CallMeasurerHelper
{
    public static function statusList(): array
    {
        return [
            CallMeasurer::STATUS_NEW => 'Новая',
            CallMeasurer::STATUS_IN_PROCESSING => 'В обработке',
            CallMeasurer::STATUS_CLOSED => 'Закрытая',
        ];
    }



    public static function statusLabel($status): string
    {
        switch ($status) {
            case CallMeasurer::STATUS_NEW:
                $class = 'label label-success';
                break;
            case CallMeasurer::STATUS_IN_PROCESSING:
                $class = 'label label-warning';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }



}