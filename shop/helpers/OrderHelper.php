<?php

namespace shop\helpers;

use shop\entities\shop\order\Order;
use shop\entities\shop\order\Status;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class OrderHelper
{


    public static function statusListForEdit(): array
    {
        return [
            Status::PROCESSING => 'В обработке',
            Status::COMPLETED => 'Завершено',
        ];
    }

    public static function statusListForSearch(): array
    {
        return [
            Status::NEW => 'Новый',
            Status::PROCESSING => 'В обработке',
            Status::COMPLETED => 'Завершено',
        ];
    }



    public static function getDeliveryMethodsList(): array
    {
        return [
            Order::DELIVERY_METHOD_NEW_POST => 'Доставка Новой почтой',
            Order::DELIVERY_METHOD_PICKUP => 'Самовывоз со склада',
        ];
    }



    public static function statusLabelForSearch($status): string
    {
        switch ($status) {
            case Status::NEW:
                $class = 'label label-success';
                break;
            case Status::PROCESSING:
                $class = 'label label-warning';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusListForSearch(), $status), [
            'class' => $class,
        ]);
    }


    public static function getStatusText($status): string
    {
        return ArrayHelper::getValue(self::statusListForSearch(), $status);
    }
}