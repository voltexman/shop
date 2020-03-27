<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\shop\CharacteristicForm */

$this->title = 'Добавить характеристику';
$this->params['breadcrumbs'][] = ['label' => 'Характеристики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="characteristic-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
