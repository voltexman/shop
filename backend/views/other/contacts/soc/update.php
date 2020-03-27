<?php

/* @var $this yii\web\View */
/* @var $soc shop\entities\other\contacts\Soc */
/* @var $model shop\forms\manage\other\contacts\SocForm */

$this->title = 'Изменить соц. сеть: ' . $soc->name;
$this->params['breadcrumbs'][] = ['label' => 'Соц. сети', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $soc->name, 'url' => ['view', 'id' => $soc->id]];
?>
<div class="brand-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
