<?php

use frontend\widgets\shop\CarouselWidget;
use frontend\widgets\shop\NewsProductsWidget;
use frontend\widgets\shop\PopularProductsWidget;
use frontend\widgets\shop\ViewedProductsWidget;

/* @var $this yii\web\View */


$this->title = 'Главная';
$this->registerMetaTag([
    'name' => 'description',
    'content' => '',
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => '',
]);

$this->params['home-page'] = 'home-page';

?>


<?= CarouselWidget::widget(['limit' => 7]) ?>

<?= ViewedProductsWidget::widget() ?>

<?= PopularProductsWidget::widget(['limit' => 4]) ?>

<?= NewsProductsWidget::widget(['limit' => 4]) ?>