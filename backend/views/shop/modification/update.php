<?php

/* @var $this yii\web\View */
/* @var $product shop\entities\shop\product\Product */
/* @var $modification shop\entities\shop\product\Modification */
/* @var $model shop\forms\manage\shop\product\ModificationForm */

$this->title = 'Изменить модификацию: ' . $modification->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['shop/product/index']];
$this->params['breadcrumbs'][] = ['label' => $product->name, 'url' => ['shop/product/view', 'id' => $product->id]];
$this->params['breadcrumbs'][] = $modification->name;
?>
<div class="modification-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
