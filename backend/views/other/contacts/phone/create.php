<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\other\contacts\PhoneForm */

$this->title = 'Добавления телефона';
$this->params['breadcrumbs'][] = ['label' => 'Телефоны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
