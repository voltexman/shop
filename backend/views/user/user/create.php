<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model shop\forms\manage\user\UserCreateForm */

$this->title = 'Добавить пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Все пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model,'firstName')->textInput(['maxLength' => true]); ?>
        <?= $form->field($model,'lastName')->textInput(['maxLength' => true]); ?>
        <?= $form->field($model,'phone')->textInput(['maxLength' => true, 'data-mask' => 'callback-catalog-phone']); ?>
        <?= $form->field($model,'email')->textInput(['maxLength' => true]); ?>
        <?= $form->field($model,'password')->passwordInput(['maxLength' => true]); ?>
        <?= $form->field($model, 'role')->dropDownList($model->rolesList()) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
