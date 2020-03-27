<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\other\carousel\CarouselForm */

$this->title = 'Создать новый слайд';
$this->params['breadcrumbs'][] = ['label' => 'Слайдер', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
