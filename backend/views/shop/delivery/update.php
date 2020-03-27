<?php

/* @var $this yii\web\View */
/* @var $method shop\entities\shop\DeliveryMethod */
/* @var $model shop\forms\manage\shop\DeliveryMethodForm */

$this->title = 'Изменить метод доставки: ' . $method->name;
$this->params['breadcrumbs'][] = ['label' => 'Методы доставки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $method->name, 'url' => ['view', 'id' => $method->id]];
?>
<div class="method-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
