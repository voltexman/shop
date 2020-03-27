<?php

use shop\helpers\PriceHelper;
use shop\helpers\ProductHelper;
use yii\helpers\Url;
use yii\helpers\Html;

/** @var $product shop\entities\shop\product\Product */


$url = Url::to(['/shop/catalog/product', 'id' => $product->id]);
$isHasImage = $product->main_photo_id ?: null;

?>


<div class="grid_column">
    <div class="product-cart">
        <?php if ($product->isHasLabel()): ?>
            <?= ProductHelper::showLabel($product->label) ?>
        <?php endif; ?>
        <div class="product-cart-image">
            <a href="<?= $url ?>">
                <img src="<?= $isHasImage ? $product->mainPhoto->getThumbFileUrl('file', 'catalog_list') : '' ?>" alt="<?= $isHasImage ? $product->mainPhoto->file : ''?>">
            </a>
        </div>
        <div class="product-cart-content">
            <div class="product-cart-content-name">
                <a href="<?= $url ?>">
                    <?= Html::encode($product->name) ?>
                </a>
            </div>
            <div class="product-cart-content-rating">
                <div class="rating-star_wrapper">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <span class="rating-star <?= $product->getIntRating() >= $i ? 'active-s' : '' ?>"></span>
                    <?php endfor; ?>
                </div>
                <div class="rating-text">
                    <span>33</span> отзыв(а)
                </div>
            </div>
            <div class="product-cart-content-price">
                <?php if ($product->price_old): ?>
                    <div class="price_ssale">
                        <?= PriceHelper::format($product->price_old) ?> <span>грн. </span>
                    </div>
                <?php endif; ?>
                <div class="main_price">
                    <?= PriceHelper::format($product->price_new) ?> <span>грн.</span>
                </div>
            </div>
            <div class="product-cart-action">
                <div class="product-cart-like-equivalence">
                    <ul class="product-cart-action-list list-style list-vertival">
                        <li>
                            <label class="checkbox_equivalence">
                                <input type="checkbox">
                                <div class="checkbox__text_equivalence">
                                    <span class="equivalence_white_icon icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" viewBox="0 0 25 20"><g><g><g><g><path fill="#313131" d="M14.432 3.505a.37.37 0 0 1-.06-.733l7.976-1.33a.37.37 0 0 1 .122.727l-7.977 1.33a.337.337 0 0 1-.06.006z"></path></g><g><path fill="#313131" d="M1.929 5.591a.37.37 0 0 1-.06-.732l8.038-1.342a.37.37 0 0 1 .122.727L1.99 5.586a.343.343 0 0 1-.061.005z"></path></g></g><g><g><g><path fill="#313131" d="M23.583 10.842a3.814 3.814 0 0 1-3.79 3.44 3.813 3.813 0 0 1-3.79-3.44zm.755-.37a.369.369 0 0 0-.368-.368h-8.354a.369.369 0 0 0-.369.369 4.551 4.551 0 0 0 4.545 4.546 4.551 4.551 0 0 0 4.546-4.546z"></path></g><g><path fill="#313131" d="M15.616 10.842a.37.37 0 0 1-.327-.54l4.177-8.003c.127-.244.526-.244.654 0l4.177 8.003a.37.37 0 0 1-.654.341l-3.85-7.376-3.85 7.376a.37.37 0 0 1-.327.199z"></path></g></g><g><g><path fill="#313131" d="M8.337 13.227a3.813 3.813 0 0 1-3.79 3.44 3.813 3.813 0 0 1-3.791-3.44zm.755-.368a.369.369 0 0 0-.369-.37H.369a.369.369 0 0 0-.369.37 4.552 4.552 0 0 0 4.546 4.546 4.551 4.551 0 0 0 4.546-4.546z"></path></g><g><path fill="#313131" d="M8.723 13.227a.37.37 0 0 1-.327-.198l-3.85-7.376-3.85 7.376a.37.37 0 0 1-.654-.341l4.177-8.003c.128-.244.527-.244.654 0l4.177 8.003a.37.37 0 0 1-.327.54z"></path></g></g></g><g><path fill="#313131" d="M14.05 3.514a1.884 1.884 0 0 1-1.88 1.88 1.884 1.884 0 0 1-1.882-1.88c0-1.037.844-1.881 1.881-1.881 1.038 0 1.882.844 1.882 1.88zm.738-.001A2.622 2.622 0 0 0 12.17.895 2.622 2.622 0 0 0 9.55 3.513a2.622 2.622 0 0 0 2.62 2.619 2.621 2.621 0 0 0 2.618-2.62z"></path></g><g><path fill="#313131" d="M12.17 20a.369.369 0 0 1-.37-.369V5.763a.369.369 0 0 1 .738 0v13.868a.369.369 0 0 1-.369.369z"></path></g><g><path fill="#313131" d="M12.17 1.633a.369.369 0 0 1-.37-.369V.37a.369.369 0 0 1 .738 0v.895a.369.369 0 0 1-.369.369z"></path></g><g><path fill="#313131" d="M17.034 20h-9.73a.369.369 0 0 1 0-.738h9.73a.369.369 0 0 1 0 .738z"></path></g></g></g></svg>
                                    </span>
                                </div>
                            </label>
                        </li>
                        <li>
                            <label class="checkbox_like">
                                <input type="checkbox">
                                <div class="checkbox__text_like">
                                    <span class="like_white_icon icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20"><g><g><g><path fill="#313131" d="M20.634 8.04c-.41 1.726-1.36 3.299-2.746 4.545l-7.115 6.302-6.993-6.3c-1.388-1.25-2.338-2.821-2.748-4.547C.737 6.8.858 6.1.858 6.095l.006-.042C1.135 3.025 3.252.827 5.9.827c1.953 0 3.672 1.192 4.488 3.11l.384.902.383-.903c.803-1.888 2.613-3.108 4.613-3.108 2.646 0 4.763 2.198 5.04 5.265 0 .007.122.707-.173 1.947zm.996-2.076C21.313 2.508 18.85 0 15.766 0c-2.054 0-3.935 1.098-4.993 2.857C9.724 1.075 7.92 0 5.899 0 2.816 0 .352 2.507.036 5.963.011 6.116-.09 6.92.22 8.23c.45 1.89 1.487 3.608 3 4.97l7.548 6.8 7.677-6.8c1.513-1.362 2.55-3.08 3-4.97.312-1.31.21-2.114.185-2.266z"></path></g><g><path fill="#313131" d="M6.666 2.533A4.171 4.171 0 0 0 2.5 6.699a.416.416 0 1 0 .834 0 3.337 3.337 0 0 1 3.333-3.333.416.416 0 1 0 0-.833z"></path></g></g></g></svg>
                                    </span>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="product-cart-action-buy">
                    <button class="btn_green">
                        <span class="shpping_cart_white icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20"><g><g><g><g><path fill="#fff" d="M1.022 1.63H3.36l3.329 12.038a.815.815 0 0 0 .788.598h10.23c.327 0 .612-.19.748-.489l3.723-8.56a.825.825 0 0 0-.068-.774.81.81 0 0 0-.68-.367H10.126a.818.818 0 0 0-.815.815c0 .449.367.815.815.815H20.18l-3.017 6.93H8.087L4.76.598A.815.815 0 0 0 3.97 0H1.022a.818.818 0 0 0-.815.815c0 .449.367.815.815.815z"></path></g><g><path fill="#fff" d="M6.702 20a1.85 1.85 0 0 0 1.847-1.848 1.85 1.85 0 0 0-1.847-1.848 1.85 1.85 0 0 0-1.848 1.848A1.85 1.85 0 0 0 6.702 20z"></path></g><g><path fill="#fff" d="M18.25 20h.136c.49-.04.938-.258 1.264-.639.326-.367.475-.842.448-1.345a1.852 1.852 0 0 0-1.97-1.712A1.851 1.851 0 0 0 18.25 20z"></path></g></g></g></g></svg>
                        </span>
                        Купить
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>