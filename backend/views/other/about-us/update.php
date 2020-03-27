<?php

/* @var $this yii\web\View */
/* @var $aboutUs \shop\entities\other\AboutUs */
/* @var $model \shop\forms\manage\other\AboutUsForm */

$this->title = 'Изменить данные о нас: ' . $aboutUs->title;
$this->params['breadcrumbs'][] = ['label' => $aboutUs->title, 'url' => ['view', 'id' => $aboutUs->id]];
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
