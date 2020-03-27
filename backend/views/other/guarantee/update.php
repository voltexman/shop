<?php

/* @var $this yii\web\View */
/* @var $guarantee shop\entities\other\Guarantee */
/* @var $model shop\forms\manage\other\GuaranteeForm */

$this->title = 'Изменить: ' . $guarantee->title;
$this->params['breadcrumbs'][] = ['label' => $guarantee->title, 'url' => ['view', 'id' => $guarantee->id]];
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
