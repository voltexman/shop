<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model shop\forms\shop\AddToCartForm */
/* @var $product shop\entities\shop\product\Product */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


$this->title = 'Добавить товар в корзину';
$this->params['breadcrumbs'][] = ['label' => 'Корзина', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<section class="s-product-variable">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-5 col-12 product-variable-image-col">
                <div class="product-variable-image-wrapper">
                    <?php if ($model->getProductImage()): ?>
                        <img src="<?= $model->getProductImage()?>" alt="image">
                    <?php else: ?>
                        <img src="<?= Url::base()?>/img/no_image.png" alt="no_image.png">
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-7 col-12">
                <div class="product-variable-wrapper">
                    <?php $form = ActiveForm::begin(['method' => 'post', 'id' => 'add-to-cart']) ?>
                        <div class="product-variable-select">
                            <h1><?= Html::encode($model->getProductName()) ?></h1>
                            <div class="sort-select d-flex">
                                <label>Модификация</label>
                                <div class="more_product-wrapper">
                                    <?php if ($modifications = $model->modificationsList()): ?>
                                        <?= $form->field($model, 'modification')->dropDownList($modifications, ['prompt' => '--- Выбрать ---', 'class' => 'nice-select select-cart-modification'])->label(false) ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="product-variable-input">
                            <label>Количество</label>
                            <div class="more_product-wrapper">
                                <div class="minus"></div>
<!--                                <input type="text" name="AddToCartForm[quantity]" value="1" class="cout-product">-->
                                <?= $form->field($model, 'quantity')->input('number',['class' => 'cout-product'])->label(false) ?>
                                <div class="plus"></div>
                            </div>
                        </div>
                        <p class="mod-available"><span>Наличие:</span> <?= $product->isAvailable() ? 'Есть в наличии' : 'Нет в наличии' ?></p>
                        <div class="s-product-variable-button-block">
                            <button type="submit" class="btn_green btn_buy">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="18" viewBox="0 0 20 18"><defs><path id="4tv7a" d="M1188.727 330.454h2.084l2.969 10.736a.727.727 0 0 0 .703.533h9.124c.29 0 .545-.17.666-.436l3.32-7.634a.736.736 0 0 0-.06-.69.722.722 0 0 0-.606-.328h-10.081a.73.73 0 0 0-.728.727c0 .4.328.727.728.727h8.966l-2.69 6.18h-8.094l-2.969-10.736a.727.727 0 0 0-.703-.533h-2.629a.73.73 0 0 0-.727.727c0 .4.327.727.727.727z"></path><path id="4tv7b" d="M1193.792 346.837a1.65 1.65 0 0 0 1.648-1.648 1.65 1.65 0 0 0-1.648-1.648 1.65 1.65 0 0 0-1.648 1.648c0 .908.74 1.648 1.648 1.648z"></path><path id="4tv7c" d="M1204.092 346.837h.12c.437-.037.837-.23 1.128-.57.29-.327.424-.751.4-1.2a1.652 1.652 0 0 0-1.757-1.526 1.65 1.65 0 0 0 .109 3.296z"></path></defs><g><g transform="translate(-1188 -329)"><g><g><use fill="#fff" xlink:href="#4tv7a"></use></g><g><use fill="#fff" xlink:href="#4tv7b"></use></g><g><use fill="#fff" xlink:href="#4tv7c"></use></g></g></g></g></svg>
                                <span>Купить</span>
                            </button>
                        </div>
                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>

</section>

<?php
