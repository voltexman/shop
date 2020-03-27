<?php

/* @var $this yii\web\View */
/* @var $model \shop\forms\manage\shop\BrandForm */
/* @var $brand \shop\entities\other\Article */

$this->title = 'Добавить бренд';
$this->params['breadcrumbs'][] = ['label' => 'Все бренды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <?= $this->render('_form', [
        'model' => $model,
        'brand' => $brand,
    ]) ?>

</div>
