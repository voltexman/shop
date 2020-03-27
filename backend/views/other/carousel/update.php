<?php

/* @var $this yii\web\View */
/* @var $carouselItem shop\entities\other\carousel\Carousel */
/* @var $model shop\forms\manage\other\carousel\CarouselForm */

$this->title = 'Изменить слайд: ' . $carouselItem->title;
$this->params['breadcrumbs'][] = ['label' => 'Слайдер', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $carouselItem->title, 'url' => ['view', 'id' => $carouselItem->id]];
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
        'carouselItem' => $carouselItem,
    ]) ?>

</div>
