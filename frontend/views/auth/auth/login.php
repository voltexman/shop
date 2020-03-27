<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model shop\forms\auth\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Вход на сайт';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-12 main_text_col">
        <h1>Вход на сайт</h1>
        <div class="only_text background_shadow">
            <div class="feetback_form_wrapper form_registrated">
                <h2>Форма входа</h2>
                <?php $form = ActiveForm::begin(['id' => 'form-login-page']); ?>

                    <?= $form->field($model, 'email')->textInput(['class' => 'input', 'placeholder' => 'Email'])->label(false) ?>

                    <?= $form->field($model, 'password')->passwordInput(['class' => 'input', 'placeholder' => 'Пароль'])->label(false) ?>

                    <div class="submit_btn_wrapper">
                        <?= Html::submitButton('Ввойти', ['class' => 'btn_orange', 'name' => 'signup-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>

                <div class="enter_title">
                    <p>
                        Если Вы уже забыли пароль, перейдите на страницу <a href="<?= Url::to(['auth/reset/request']) ?>">ввостановления пароля</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
