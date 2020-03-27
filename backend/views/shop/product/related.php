<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $product shop\entities\shop\product\Product */
/* @var $model shop\forms\manage\shop\product\RelatedProductsForm */

$this->title = 'Добавить/изменить связаные товары к: ' . $product->name;
$this->params['breadcrumbs'][] = ['label' => 'Виджеты категорий', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $product->name, 'url' => ['view', 'id' => $product->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-update">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">Товары</div>
                <div class="box-body">
                    <?= $form->field($model, 'relatedProducts')->checkboxList($model->productsList()) ?>
                </div>
            </div>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
