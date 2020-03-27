<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\payment\PaymentKeysForm */

$this->title = 'Изменить ключи ';
$this->params['breadcrumbs'][] = ['label' => 'Просмотр ключей', 'url' => ['view']];
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
