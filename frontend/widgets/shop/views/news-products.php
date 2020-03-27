<?php

/** @var $products shop\entities\shop\product\Product[] */
/** @var $this yii\web\View */

?>

<?php if (!empty($products)): ?>
    <section class="s-news-products">
        <div class="container">
            <div class="custom_row">
                <div class="title_column column">
                    <div class="column-title">
                        <span class="view_icon icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g><g><g><path fill="#8f67ff" d="M15.217 15.02l-.367 1.966-1.232-1.797a8.107 8.107 0 0 0 2.239-1.738l1.327 1.936zM3.007 8.055a6.884 6.884 0 0 1 6.875-6.876 6.884 6.884 0 0 1 6.876 6.876 6.884 6.884 0 0 1-6.876 6.876 6.884 6.884 0 0 1-6.875-6.876zm1.907 8.931l-.366-1.966-1.967.367 1.327-1.936a8.107 8.107 0 0 0 2.24 1.738zm11.7-4.514a8.007 8.007 0 0 0 1.323-4.417C17.937 3.613 14.324 0 9.882 0c-4.44 0-8.054 3.613-8.054 8.055 0 1.63.487 3.148 1.323 4.417L0 17.067l3.605-.672L4.277 20l2.972-4.333a8.02 8.02 0 0 0 2.633.442c.923 0 1.809-.156 2.634-.442L15.488 20l.672-3.605 3.605.672z"/></g><g><path fill="#8f67ff" d="M8.447 9.824L6.53 7.907l-.833.834 2.75 2.75 5.621-5.622-.833-.833z"/></g></g></g></svg>
                        </span>
                        Новинки
                    </div>
                </div>
            </div>
        </div>
        <div class="container grid_container">
            <div class="custom_row">
                <?php foreach ($products as $product): ?>

                    <?= $this->render('../../../views/layouts/_product-card', [
                        'product' => $product
                    ]); ?>

                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>