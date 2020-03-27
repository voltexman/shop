<?php

/* @var $this yii\web\View */
/* @var $brand \shop\entities\shop\Brand */
/* @var $model \shop\forms\manage\shop\BrandForm */

$this->title = 'Изменить бренд: ' . $brand->name;
$this->params['breadcrumbs'][] = ['label' => 'Все бренды', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $brand->name, 'url' => ['view', 'id' => $brand->id]];
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
        'brand' => $brand,
    ]) ?>

</div>
