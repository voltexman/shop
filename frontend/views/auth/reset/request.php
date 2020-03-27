<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model shop\forms\auth\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Ввостановления пароля';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-12 main_text_col">
        <h1><?= $this->title ?></h1>
        <div class="only_text background_shadow">
            <div class="feetback_form_wrapper form_registrated">
                <h2>Введите свой email</h2>
                <?php $form = ActiveForm::begin(['id' => 'form-request']); ?>

                    <?= $form->field($model, 'email')->textInput(['class' => 'input', 'placeholder' => 'Email'])->label(false) ?>

                    <div class="submit_btn_wrapper">
                        <?= Html::submitButton('Ввостановить', ['class' => 'btn_orange', 'name' => 'signup-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>