<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\user\UserEditForm */
/* @var $user shop\entities\user\User */

$this->title = 'Изменить пользователя: ' . $user->getUsername();
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->getUsername(), 'url' => ['view', 'id' => $user->id]];
?>
<div class="user-update">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model,'firstName')->textInput(['maxLength' => true]); ?>
        <?= $form->field($model,'lastName')->textInput(['maxLength' => true]); ?>
        <?= $form->field($model,'phone')->textInput(['maxLength' => true, 'data-mask' => 'callback-catalog-phone']); ?>
        <?= $form->field($model,'email')->textInput(['maxLength' => true]); ?>
        <?= $form->field($model, 'role')->dropDownList($model->rolesList()) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
