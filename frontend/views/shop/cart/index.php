<?php

/* @var $this yii\web\View */
/* @var $cart \shop\cart\Cart */

use shop\helpers\PriceHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;



?>


<section class="s-basket">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row s-basket-item-header">
                    <div class="col-11">
                        <div class="row">
                            <div class="col-3 basket-th">Товары</div>
                            <div class="col-3 basket-th">Цена</div>
                            <div class="col-3 basket-th">Количество</div>
                            <div class="col-3 basket-th">Сума</div>
                        </div>
                    </div>
                </div>

                <?php foreach ($cart->getItems() as $item): ?>
                    <?php
                        $product = $item->getProduct();
                        $modification = $item->getModification();
                        $url = Url::to(['/shop/catalog/product', 'id' => $product->id]);
                    ?>

                    <div class="row s-basket-item">
                        <div class="col-md-11 col-sm-11 col-10">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 s-basket-td">
                                    <div class="product-table-image-title-wrapper">
                                        <div class="product-table-image">
                                            <a href="<?= Html::encode($url) ?>">
                                                <?php if ($product->main_photo_id): ?>
                                                    <img src="<?= $product->mainPhoto->getThumbFileUrl('file', 'thumb') ?>" alt="<?= $product->mainPhoto->file?>">
                                                <?php else: ?>

                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="product-table-title">
                                            <div class="product-table-name">
                                                <a href="<?= Html::encode($url) ?>"><?= Html::encode($product->name) ?></a>
                                            </div>
                                            <?php if ($modification): ?>
                                                <div class="table-procut-variable"><?= Html::encode($modification->name) ?></div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 s-basket-td">
                                    <?= PriceHelper::format($item->getPrice()) ?> грн
                                </div>
                                <div class="col-md-3 col-sm-3 s-basket-td">
                                    <div class="more_product">

                                        <?= Html::beginForm(['quantity', 'id' => $item->getId()], '',['class' => 'set-quantity-form']); ?>
                                            <div class="more_product-wrapper">
                                                <div class="minus set-quantity"></div>
                                                    <input type="text" name="quantity" value="<?= $item->getQuantity() ?>" class="cout-product">
                                                <div class="plus set-quantity"></div>
                                            </div>
                                        <?= Html::endForm() ?>

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 s-basket-td">
                                    <?= PriceHelper::format($item->getCost()) ?> грн.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-1 col-2 delate">
                            <div class="row">
                                <div class="col-12 basket-delate">
                                    <a href="<?= Url::to(['remove', 'id' => $item->getId()]) ?>" class="delete-product">x</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
            <div class="col-12">
                <div class="basket-under-table-block">
                    <div class="sum-finish">
                        <p>
                            <span class="f-order-text">Итого:</span> <?= PriceHelper::format($cart->getCost()->getTotal()) ?>
                            <span>грн.</span>
                        </p>
                    </div>
                    <div class="basket-under-table-button-block">
                        <a href="<?= Url::to(['/shop/catalog/search']) ?>" class="btn_green">Продолжить  покупки</a>
                        <a href="<?= Url::to('/shop/checkout/index') ?>" class="btn_green">Оформить заказ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>





