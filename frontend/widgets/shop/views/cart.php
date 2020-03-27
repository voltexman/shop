<?php

/* @var $cart \shop\cart\Cart */



use yii\helpers\Url;
?>


<div class="header-cart-wraper">
    <div id="cart" class="shortcut">
        <a href="<?= Url::to(['/shop/cart/index']) ?>" class="shortcut_heading">
            <span class="header-cart-icon"></span>
            <span class="header-cart-title">Корзина</span>
            <span class="header-cart-count"><?= $cart->getAmount() ?></span>
        </a>
    </div>
</div>


