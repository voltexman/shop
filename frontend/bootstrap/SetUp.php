<?php

namespace frontend\bootstrap;

use yii\base\BootstrapInterface;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;


class SetUp implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $container = \Yii::$container;

        $container->set(Breadcrumbs::class, function ($container, $params, $args) {
            return new Breadcrumbs(ArrayHelper::merge([
                'homeLink' => [
                    'label' => 'Главная',
                    'encode' => false,
                    'url' => \Yii::$app->homeUrl,
                ],
            ],
            [
                'options' => [
                    'class' => 'breadcrumb list-style list-vertival',
                ],
            ],
            $args));
        });

    }
}