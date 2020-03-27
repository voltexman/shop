<?php

/* @var $this yii\web\View */
/* @var $address shop\entities\other\contacts\Address */
/* @var $model shop\forms\manage\other\contacts\AddressForm */

$this->title = 'Изменить адрес: ' . $address->text;
$this->params['breadcrumbs'][] = ['label' => 'Адрес', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $address->text, 'url' => ['view', 'id' => $address->id]];
?>
<div class="brand-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
