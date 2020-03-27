<?php

/* @var $this yii\web\View */
/* @var $review shop\entities\shop\product\Review */
/* @var $model shop\forms\manage\shop\product\ReviewEditForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Изменить отзыв к продукту: ' . $review->product->name;
$this->params['breadcrumbs'][] = ['label' => 'Отзывы', 'url' => ['index']];
?>
<div class="order-update">

    <?php $form = ActiveForm::begin() ?>

    <div class="box box-default">
        <div class="box-header with-border">Отзыв</div>
        <div class="box-body">
            <?= $form->field($model, 'text')->textarea(['rows' => 5]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
