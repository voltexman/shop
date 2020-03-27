<?php

/* @var $this yii\web\View */
/* @var $order shop\entities\shop\order\Order */
/* @var $model shop\forms\manage\shop\order\OrderEditForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Изменить заказ на номен: ' . $order->customerData->phone . ' от ' . Yii::$app->formatter->asDatetime($order->created_at);
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $order->customerData->phone, 'url' => ['view', 'id' => $order->id]];
?>
<div class="order-update">

    <?php $form = ActiveForm::begin() ?>

    <div class="box box-default">
        <div class="box-body">
            <?= $form->field($model, 'status')->dropDownList($model->statusListForEdit(),['prompt' => '']) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
