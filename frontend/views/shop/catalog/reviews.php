<?php

use shop\helpers\PriceHelper;
use shop\helpers\ProductHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $product shop\entities\shop\product\Product */
/* @var $addToCartForm shop\forms\shop\AddToCartForm */
/* @var $reviewForm shop\forms\shop\ReviewForm */
/* @var $answerReviewForm shop\forms\shop\AnswerReviewForm */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Комментарии к ' . $product->name;

foreach ($product->category->parents as $parent) {
    if (!$parent->isRoot()) {
        $this->params['breadcrumbs'][] = ['label' => $parent->name, 'url' => ['shop/catalog/catalog', 'category' => $parent->id]];
    }
}

$this->params['breadcrumbs'][] = ['label' => $product->category->name, 'url' => ['shop/catalog/catalog', 'category' => $product->category->id]];
$this->params['breadcrumbs'][] = $this->title;

?>


<section class="s-reviews-page">
    <div class="container">
        <div class="custom_row">
            <div class="reviews-for-page-reviews-coment column">
                <div class="reviews-for-page-reviews-coment-wrapper">
                    <div class="vd__info--product-wrapper-item-title">
                        <h1><?= Html::encode($product->name) ?></h1>
                    </div>
                    <div class="vd__info--product-wrapper-item-action-item">
                        <div class="product-cart-content-rating">
                            <div class="rating-star_wrapper">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <span class="rating-star <?= $product->getIntRating() >= $i ? 'active-s' : '' ?>"></span>
                                <?php endfor; ?>
                            </div>
                            <div class="rating-text">
                                <span><?= $product->getReviewsCount() ?></span> отзыв(а)
                            </div>
                        </div>
                    </div>
                    <div class="reviews-column-wapper">
                        <div class="eviews-column-button-add">
                            <div class="info_text_about_product_wrapper">
                                <div class="info_text_about_product-title">
                                    <div class="info_text_name">Отзывы покупателей о <?= Html::encode($product->name) ?> </div>
                                </div>
                            </div>
                            <div class="reviews-column-button-add--button_wrapper">
                                <?php if (!Yii::$app->user->isGuest): ?>
                                    <a href="#add_reviws_block" class="yellow_light anhor">
                                        Написать отзыв
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="reviews_wrapper">

                            <?php if (!empty($dataProvider->getModels())): ?>
                                <?php foreach ($dataProvider->getModels() as $review): ?>
                                    <div class="reviews_wrapper-item" id="review_<?=$review->id?>">
                                        <div class="reviews_wrapper-joint reviews-main">
                                            <div class="reviews_rating_and_name_date">
                                                <div class="reviews_name_rating_wrapper">
                                                    <div class="reviews_name">
                                                        <?= Html::encode($review->user->getUsername()) ?>
                                                    </div>
                                                    <?php if ($review->getRating() > 0): ?>
                                                        <div class="reviews_rating">
                                                            <div class="rating-star_wrapper">
                                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                    <span class="rating-star <?= $review->vote >= $i ? 'active-s' : '' ?>"></span>
                                                                <?php endfor; ?>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="reviews_data">
                                                    <?= ProductHelper::showDate($review->created_at) ?>
                                                </div>
                                            </div>
                                            <div class="review_content">
                                                <p>
                                                    <?= Html::encode($review->text) ?>
                                                </p>
                                            </div>
                                            <div class="review_answer_button">
                                                <?php if (!Yii::$app->user->isGuest): ?>
                                                    <div class="review_button" data-review="<?= $review->id ?>">
                                                        Ответить
                                                        <span class="massagge_icon icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12"><g><g><path fill="#7d7d7d" d="M11.002 0h-9.6c-.66 0-1.2.54-1.2 1.2V12l2.4-2.4h8.4c.66 0 1.2-.54 1.2-1.2V1.2c0-.66-.54-1.2-1.2-1.2z"/></g></g></svg>
                                                    </span>
                                                    </div>
                                                <?php else: ?>
                                                    <a href="<?= Url::to(['/login']) ?>" class=" review_button_not_auth">
                                                        Ответить
                                                        <span class="massagge_icon icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12"><g><g><path fill="#7d7d7d" d="M11.002 0h-9.6c-.66 0-1.2.54-1.2 1.2V12l2.4-2.4h8.4c.66 0 1.2-.54 1.2-1.2V1.2c0-.66-.54-1.2-1.2-1.2z"/></g></g></svg>
                                                    </span>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <?php if ($review->answers): ?>
                                            <div class="reviews_wrapper-answer">
                                                <?php foreach ($review->answers as $answer): ?>
                                                    <?php /** @var shop\entities\shop\product\AnswerReview $answer */ ?>
                                                    <div class="reviews_wrapper-joint reviews-child">
                                                        <div class="reviews_rating_and_name_date">
                                                            <div class="reviews_name_rating_wrapper">
                                                                <div class="reviews_name">
                                                                    <?= Html::encode($answer->getUsername()) ?>
                                                                </div>
                                                            </div>
                                                            <div class="reviews_data">
                                                                <?= ProductHelper::showDate($answer->created_at) ?>
                                                            </div>
                                                        </div>
                                                        <div class="review_content">
                                                            <p>
                                                                <?= Html::encode($answer->text) ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>


                            <div class="pagination_wraper">

                                <?= LinkPager::widget([
                                    'pagination' => $dataProvider->getPagination(),
                                    'options' => [
                                        'class' => 'pagination list-style list-vertival'
                                    ],
                                ]) ?>


                            </div>
                            <div class="answer_form">
                                <?php $form = ActiveForm::begin(['id' => 'answer-review-form']) ?>
                                    <?= $form->field($answerReviewForm, 'reviewId')->hiddenInput(['id' => 'review-id'])->label(false) ?>
                                    <div class="answer_form_wrapper">
                                        <div class="answer_form_wrapper-item">
                                            <?= $form->field($answerReviewForm, 'text')->textarea(['class' => 'answer_input', 'id' => 'coment']) ?>
                                        </div>
                                        <div class="answer_form_wrapper-button">
                                            <a href="#" class="answer_modal_close" id="standart_coment-popap">Отмена</a>
                                            <button type="submit" class="yellow_light">Добавить</button>
                                        </div>
                                        <div class="answer_form_wrapper-text">
                                            <p>
                                                При регистрации вы соглашаетесь с
                                                <a href="#">пользовательским соглашением</a>
                                            </p>
                                            <p>
                                                Важно! Чтобы Ваш отзыв либо комментарий прошел модерацию и был опубликован, ознакомьтесь, пожалуйста, с
                                                <a href="#">нашими правилами</a>
                                            </p>
                                        </div>
                                    </div>
                                <?php ActiveForm::end() ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!Yii::$app->user->isGuest): ?>
                    <div class="add_reviews_block_main" id="add_reviws_block">
                    <ul class="tabs list-style list-vertival" data-tabgroup="first-tab-group">
                        <li><a href="#tab1" class="btn-blue active">Отзыв о товаре</a></li>
                        <li><a href="#tab2" class="btn-blue">Краткий комментарий</a></li>
                    </ul>
                    <div id="first-tab-group" class="tabgroup">
                        <div id="tab1" class="form_group_wrapper_rewie" style="">
                            <?php $form = ActiveForm::begin(['id' => 'form-review']) ?>
                            <?= $form->field($reviewForm, 'vote')->hiddenInput(['id' => 'vote-input'])->label(false) ?>
                            <div class="product_rating__wrapper">
                                <div class="rating-action">
                                    <div class="title-label">
                                        Поставьте рейтинг товару
                                    </div>
                                    <div class='rating-stars text-center'>
                                        <ul id='stars'>
                                            <li class='star' title='Poor' data-value='1'><span class="star-w"></span></li>
                                            <li class='star' title='Fair' data-value='2'><span class="star-w"></span></li>
                                            <li class='star' title='Good' data-value='3'><span class="star-w"></span></li>
                                            <li class='star' title='Excellent' data-value='4'><span class="star-w"></span></li>
                                            <li class='star' title='WOW!!!' data-value='5'><span class="star-w"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form_group_wrapper_rewie-item">
                                <?= $form->field($reviewForm, 'text')->textarea(['class' => 'answer_input'])->label() ?>
                            </div>
                            <div class="form_group_wrapper_button">
                                <button type="submit" class="yellow_light">Написать отзыв</button>
                            </div>
                            <?php ActiveForm::end() ?>
                        </div>
                        <div id="tab2" class="form_group_wrapper_rewie" style="display: none;">
                            <?php $form = ActiveForm::begin(['id' => 'form-comment']) ?>
                            <div class="form_group_wrapper_rewie-item">
                                <?= $form->field($reviewForm, 'text')->textarea(['class' => 'answer_input'])->label() ?>
                            </div>
                            <div class="form_group_wrapper_button">
                                <button type="submit" class="yellow_light">Написать комментарий</button>
                            </div>
                            <?php ActiveForm::end() ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php
                $url = Url::to(['/shop/catalog/product', 'id' => $product->id]);
                $isHasImage = $product->main_photo_id ?: null;
            ?>
            <div class="reviews-for-that-product column">
                <div class="reviews-for-that-product-wrapper">
                    <div class="reviews-for-that-product-wrapper-small-prod">
                        <div class="reviews-for-that-product-wrapper-small-prod-image">
                            <a href="<?=$url?>">
                                <img src="<?= $isHasImage ? $product->mainPhoto->getThumbFileUrl('file', 'catalog_list') : '' ?>" alt="<?= $isHasImage ? $product->mainPhoto->file : ''?>">
                            </a>
                        </div>
                        <div class="eviews-for-that-product-wrapper-small-prod-name">
                            <a href="<?=$url?>">
                                <?= Html::encode($product->name) ?>
                            </a>
                        </div>
                    </div>
                    <div class="reviews-for-that_md-wrapper_flex">
                        <div class="product__price__main_item">
                            <div class="product__price__main_sum with_sale">
                                <?php if ($product->price_old): ?>
                                    <div class="product__price__main_sum-old">
                                        <?= PriceHelper::format($product->price_old) ?> грн.
                                    </div>
                                <?php endif; ?>
                                <div class="product__price__main_sum-standart">
                                    <?= PriceHelper::format($product->price_new) ?> грн.
                                </div>
                            </div>
                            <div class="product__price__main_button">
                                <button class="btn_green">
                                    <span class="shpping_cart_white icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20"><g><g><g><g><path fill="#fff" d="M1.022 1.63H3.36l3.329 12.038a.815.815 0 0 0 .788.598h10.23c.327 0 .612-.19.748-.489l3.723-8.56a.825.825 0 0 0-.068-.774.81.81 0 0 0-.68-.367H10.126a.818.818 0 0 0-.815.815c0 .449.367.815.815.815H20.18l-3.017 6.93H8.087L4.76.598A.815.815 0 0 0 3.97 0H1.022a.818.818 0 0 0-.815.815c0 .449.367.815.815.815z"></path></g><g><path fill="#fff" d="M6.702 20a1.85 1.85 0 0 0 1.847-1.848 1.85 1.85 0 0 0-1.847-1.848 1.85 1.85 0 0 0-1.848 1.848A1.85 1.85 0 0 0 6.702 20z"></path></g><g><path fill="#fff" d="M18.25 20h.136c.49-.04.938-.258 1.264-.639.326-.367.475-.842.448-1.345a1.852 1.852 0 0 0-1.97-1.712A1.851 1.851 0 0 0 18.25 20z"></path></g></g></g></g></svg>
                                    </span>
                                    Купить
                                </button>
                            </div>
                        </div>
                        <div class="vd__info--product-wrapper-item-action">
                            <div class="vd__info--product-wrapper-item-action-item action_wrap">
                                <div class="vd__info--product-icon">
                                    <label class="checkbox_like">
                                        <input type="checkbox" tabindex="0">
                                        <div class="checkbox__text_like">
                                            <span class="like_white_icon icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20"><g><g><g><path fill="#313131" d="M20.634 8.04c-.41 1.726-1.36 3.299-2.746 4.545l-7.115 6.302-6.993-6.3c-1.388-1.25-2.338-2.821-2.748-4.547C.737 6.8.858 6.1.858 6.095l.006-.042C1.135 3.025 3.252.827 5.9.827c1.953 0 3.672 1.192 4.488 3.11l.384.902.383-.903c.803-1.888 2.613-3.108 4.613-3.108 2.646 0 4.763 2.198 5.04 5.265 0 .007.122.707-.173 1.947zm.996-2.076C21.313 2.508 18.85 0 15.766 0c-2.054 0-3.935 1.098-4.993 2.857C9.724 1.075 7.92 0 5.899 0 2.816 0 .352 2.507.036 5.963.011 6.116-.09 6.92.22 8.23c.45 1.89 1.487 3.608 3 4.97l7.548 6.8 7.677-6.8c1.513-1.362 2.55-3.08 3-4.97.312-1.31.21-2.114.185-2.266z"></path></g><g><path fill="#313131" d="M6.666 2.533A4.171 4.171 0 0 0 2.5 6.699a.416.416 0 1 0 .834 0 3.337 3.337 0 0 1 3.333-3.333.416.416 0 1 0 0-.833z"></path></g></g></g></svg>
                                            </span>
                                        </div>
                                    </label>
                                </div>
                                <div class="vd__info--product-text">
                                    В список желаний
                                </div>
                            </div>
                            <div class="vd__info--product-wrapper-item-action-item action_wrap">
                                <div class="vd__info--product-icon">
                                    <label class="checkbox_equivalence">
                                        <input type="checkbox" tabindex="0">
                                        <div class="checkbox__text_equivalence">
                                            <span class="equivalence_white_icon icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" viewBox="0 0 25 20"><g><g><g><g><path fill="#313131" d="M14.432 3.505a.37.37 0 0 1-.06-.733l7.976-1.33a.37.37 0 0 1 .122.727l-7.977 1.33a.337.337 0 0 1-.06.006z"></path></g><g><path fill="#313131" d="M1.929 5.591a.37.37 0 0 1-.06-.732l8.038-1.342a.37.37 0 0 1 .122.727L1.99 5.586a.343.343 0 0 1-.061.005z"></path></g></g><g><g><g><path fill="#313131" d="M23.583 10.842a3.814 3.814 0 0 1-3.79 3.44 3.813 3.813 0 0 1-3.79-3.44zm.755-.37a.369.369 0 0 0-.368-.368h-8.354a.369.369 0 0 0-.369.369 4.551 4.551 0 0 0 4.545 4.546 4.551 4.551 0 0 0 4.546-4.546z"></path></g><g><path fill="#313131" d="M15.616 10.842a.37.37 0 0 1-.327-.54l4.177-8.003c.127-.244.526-.244.654 0l4.177 8.003a.37.37 0 0 1-.654.341l-3.85-7.376-3.85 7.376a.37.37 0 0 1-.327.199z"></path></g></g><g><g><path fill="#313131" d="M8.337 13.227a3.813 3.813 0 0 1-3.79 3.44 3.813 3.813 0 0 1-3.791-3.44zm.755-.368a.369.369 0 0 0-.369-.37H.369a.369.369 0 0 0-.369.37 4.552 4.552 0 0 0 4.546 4.546 4.551 4.551 0 0 0 4.546-4.546z"></path></g><g><path fill="#313131" d="M8.723 13.227a.37.37 0 0 1-.327-.198l-3.85-7.376-3.85 7.376a.37.37 0 0 1-.654-.341l4.177-8.003c.128-.244.527-.244.654 0l4.177 8.003a.37.37 0 0 1-.327.54z"></path></g></g></g><g><path fill="#313131" d="M14.05 3.514a1.884 1.884 0 0 1-1.88 1.88 1.884 1.884 0 0 1-1.882-1.88c0-1.037.844-1.881 1.881-1.881 1.038 0 1.882.844 1.882 1.88zm.738-.001A2.622 2.622 0 0 0 12.17.895 2.622 2.622 0 0 0 9.55 3.513a2.622 2.622 0 0 0 2.62 2.619 2.621 2.621 0 0 0 2.618-2.62z"></path></g><g><path fill="#313131" d="M12.17 20a.369.369 0 0 1-.37-.369V5.763a.369.369 0 0 1 .738 0v13.868a.369.369 0 0 1-.369.369z"></path></g><g><path fill="#313131" d="M12.17 1.633a.369.369 0 0 1-.37-.369V.37a.369.369 0 0 1 .738 0v.895a.369.369 0 0 1-.369.369z"></path></g><g><path fill="#313131" d="M17.034 20h-9.73a.369.369 0 0 1 0-.738h9.73a.369.369 0 0 1 0 .738z"></path></g></g></g></svg>
                                            </span>
                                        </div>
                                    </label>
                                </div>
                                <div class="vd__info--product-text">
                                    Сравнить
                                </div>
                            </div>
                        </div>
                        <div class="back_to_product_cart">
                            <a href="<?= $url ?>" class="btn_gray">
                                <span class="filter_icon icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="8" viewBox="0 0 15 8"><g><g><path fill="#313131" d="M.198.155a.528.528 0 0 1 .747 0l6.57 6.583L14.098.155a.528.528 0 1 1 .747.747L7.902 7.845A.515.515 0 0 1 7.528 8a.538.538 0 0 1-.373-.155L.21.902A.518.518 0 0 1 .198.155z"></path></g></g></svg>
                                </span>
                                Все о товаре
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







