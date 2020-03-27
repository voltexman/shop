<?php

/* @var $this yii\web\View */
/* @var $cart \shop\cart\Cart */
/* @var $model \shop\forms\shop\order\OrderForm */

use shop\helpers\OrderHelper;
use shop\helpers\PriceHelper;
use yii\bootstrap\ActiveForm;
use shop\entities\shop\order\Order;
use yii\helpers\Html;


$this->title = 'Оформление заказа';
$this->params['breadcrumbs'][] = $this->title;
?>




<section class="s-finish-buy">
    <div class="container">
        <?php $form = ActiveForm::begin(['id' => 'order_form']) ?>
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="table-order-new-wrapper-adaptive">
                        <div class="row">
                            <div class="col-12 table-order-new-wrapper-adaptive-thead">
                                <div class="row">
                                    <div class="col-3 adaptive-thead-th">Товары</div>
                                    <div class="col-3 adaptive-thead-th">Цена</div>
                                    <div class="col-3 adaptive-thead-th">Количество</div>
                                    <div class="col-3 adaptive-thead-th">Сума</div>
                                </div>
                            </div>

                            <?php foreach ($cart->getItems() as $item): ?>

                                <?php
                                    $product = $item->getProduct();
                                    $modification = $item->getModification();
                                ?>


                                <div class="col-12 table-order-new-wrapper-adaptive-td">
                                    <div class="row">
                                        <div class="col-sm-3 adaptive-tbody-td">
                                            <span class="hedden-sm-td">Товары: </span>
                                            <span class="prod-name"><?= Html::encode($product->name) ?></span>
                                            <?php if ($modification): ?>
                                                <span class="mod-name"><?= Html::encode($modification->name) ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-sm-3  adaptive-tbody-td">
                                            <span class="hedden-sm-td">Цена: </span><?= PriceHelper::format($item->getPrice()) ?> грн</div>
                                        <div class="col-sm-3  adaptive-tbody-td">
                                            <span class="hedden-sm-td">Количество: </span><?= $item->getQuantity() ?></div>
                                        <div class="col-sm-3  adaptive-tbody-td">
                                            <span class="hedden-sm-td">Сума: </span><?= PriceHelper::format($item->getCost()) ?> грн
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="order-coment-col">
                        <div class="order-coment-wrapper">
                            <?= $form->field($model, 'note')->textarea(['placeholder' => 'Комментарий'])->label(false) ?>
                        </div>
                        <div class="sum-finish">
                            <p><span class="f-order-text">Итого:</span> <?= PriceHelper::format($cart->getCost()->getTotal()) ?> <span>грн.</span></p>
                        </div>
                        <div class="order-button_block">
                            <button type="submit" class="btn_green">Подтвердить заказ</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 order-form">
                    <div class="fomt-box">
                        <?= $form->field($model->customer, 'first_name')->textInput(['placeholder' => 'Имя*', 'class' => 'form-input'])->label(false) ?>
                    </div>
                    <div class="fomt-box">
                        <?= $form->field($model->customer, 'last_name')->textInput(['placeholder' => 'Фамилия', 'class' => 'form-input'])->label(false) ?>
                    </div>
                    <div class="fomt-box">
                        <?= $form->field($model->customer, 'phone')->textInput(['placeholder' => 'Телефон*', 'class' => 'form-input', 'data-mask' => 'callback-catalog-phone'])->label(false) ?>

                    </div>
                    <div class="fomt-box">
                        <?= $form->field($model->customer, 'city')->textInput(['placeholder' => 'Город*', 'class' => 'form-input'])->label(false) ?>

                    </div>
                    <div class="fomt-box">
                        <?= $form->field($model->customer, 'department_post')->textInput(['placeholder' => 'Отделение Новой почты', 'class' => 'form-input'])->label(false) ?>
                    </div>
                    <div class="fomt-box-radio-button">
                        <div class="fomt-box-radio-label">Способ доставки</div>
                        <ul class="fomt-box-radio-list">
                            <?php foreach (OrderHelper::getDeliveryMethodsList() as $key => $value): ?>
                                <li>
                                    <label class="radio__order">
                                        <input type="radio" name="OrderForm[delivery_method]" value="<?=$key?>" <?= $key==Order::DELIVERY_METHOD_NEW_POST ? 'checked' : '' ; ?> >
                                        <div class="radio__text__order"><?= $value ?></div>
                                    </label>
                                </li>

                            <?php endforeach; ?>

                        </ul>
                    </div>
                    <div class="order-sent-visibility-md">
                        <div class="order-coment-col">
                            <div class="order-coment-wrapper">
                                <?= $form->field($model, 'note')->textarea(['placeholder' => 'Комментарий'])->label(false) ?>
                            </div>
                            <div class="sum-finish">
                                <p><span class="f-order-text">Итого:</span> <?= PriceHelper::format($cart->getCost()->getTotal()) ?> <span>грн.</span></p>
                            </div>
                            <div class="order-button_block">
                                <button type="submit" class="btn_green">Подтвердить заказ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</section>



    
