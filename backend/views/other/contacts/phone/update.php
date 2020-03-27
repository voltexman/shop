<?php

/* @var $this yii\web\View */
/* @var $phone shop\entities\other\contacts\Phone */
/* @var $model shop\forms\manage\other\contacts\PhoneForm */

$this->title = 'Изменить телефон: ' . $phone->text;
$this->params['breadcrumbs'][] = ['label' => 'Телефоны', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $phone->text, 'url' => ['view', 'id' => $phone->id]];
?>
<div class="brand-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
