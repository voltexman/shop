<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model shop\forms\auth\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="container text-page-name">
    <div class="custom_row">
        <div class="column">
            <h1>
                <?= $this->title ?>
            </h1>
        </div>
    </div>
</div>

<section class="page-enter">
    <div class="container">
        <div class="custom_row">
            <div class="column">
                <div class="enter-form-wrapper">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                        <ul class="enter-form-list">
                            <li>
                                <label class="label-form-control required">
                                    <span class="label-text">Имя</span>
                                    <input type="text" maxlength="255" name="SignupForm[first_name]" class="input-form-control" required>
                                </label>
                            </li>
                            <li>
                                <label class="label-form-control required">
                                    <span class="label-text">Email</span>
                                    <input type="email" name="SignupForm[email]" class="input-form-control" required>
                                </label>
                            </li>
                            <li>
                                <label class="label-form-control required">
                                    <span class="label-text">Пороль</span>
                                    <input type="password" name="SignupForm[password]" class="input-form-control" required>
                                </label>
                            </li>
                        </ul>
                        <div class="enter-and-registration">
                            <div class="enter-and-registration-btn-wrap">
                                <button class="btn_green" type="submit">Зарегистрироваться</button>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>


