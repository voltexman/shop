<?php

/* @var $this yii\web\View */
/* @var $deliveryAndPayment shop\entities\other\DeliveryAndPayment */
/* @var $model shop\forms\manage\other\DeliveryAndPaymentForm*/

$this->title = 'Изменить: ' . $deliveryAndPayment->title;
$this->params['breadcrumbs'][] = ['label' => $deliveryAndPayment->title, 'url' => ['view', 'id' => $deliveryAndPayment->id]];
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
