<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\payment\PaymentRulesForm */

$this->title = 'Изменить правила оплаты ';
$this->params['breadcrumbs'][] = ['label' => 'Просмотр правил оплаты', 'url' => ['view']];
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
