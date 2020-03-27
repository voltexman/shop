<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\shop\DeliveryMethodForm */

$this->title = 'Добавить метод доставки';
$this->params['breadcrumbs'][] = ['label' => 'Методы доставки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="method-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
