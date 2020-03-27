<?php

namespace shop\helpers;

use shop\entities\other\Vacancy;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class VacancyHelper
{
    public static function statusList(): array
    {
        return [
            Vacancy::STATUS_DRAFT => 'Не активный',
            Vacancy::STATUS_ACTIVE => 'Активный',
        ];
    }




    public static function statusName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }



    public static function statusLabel($status): string
    {
        switch ($status) {
            case Vacancy::STATUS_DRAFT:
                $class = 'label label-default';
                break;
            case Vacancy::STATUS_ACTIVE:
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