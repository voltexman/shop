<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */

/* @var $answerReviewEditForm shop\forms\manage\shop\product\AnswerReviewEditForm */

?>


<div class="customer-form">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-default">
                <div class="box-body">
                    <?php $form = ActiveForm::begin(); ?>
                        <div class="form-group">
                            <?= $form->field($answerReviewEditForm, 'text')->textarea(['rows' => 5]) ?>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton( 'Сохранить', ['class' => 'btn btn-primary']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
