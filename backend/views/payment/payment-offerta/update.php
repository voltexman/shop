<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\payment\PaymentOffertaForm */

$this->title = 'Изменить офферту';
$this->params['breadcrumbs'][] = ['label' => 'Просмотр офферты', 'url' => ['view']];
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
