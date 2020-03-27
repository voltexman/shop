<?php


use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\payment\PaymentOffertaForm */



?>
<div class="article">

    <?php $form = ActiveForm::begin(); ?>


        <div class="box box-default">
            <div class="box-header with-border">Общие</div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'title')->textInput(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'description')->widget(CKEditor::class) ?>
                    </div>
                </div>
            </div>
        </div>



        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
