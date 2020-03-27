<?php

/** @var $products shop\entities\shop\product\Product[] */
/** @var $this yii\web\View */

?>

<?php if (!empty($products)): ?>
    <section class="s-view-product">
        <div class="container">
            <div class="custom_row">
                <div class="title_column column">
                    <div class="column-title">
                    <span class="view_icon icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="20" viewBox="0 0 31 20"><g><g><g><path fill="#fa0" d="M15.281 17.882c-5.448 0-10.51-3.077-13.036-7.882C4.772 5.195 9.833 2.118 15.28 2.118c5.449 0 10.51 3.077 13.037 7.882-2.527 4.804-7.588 7.882-13.037 7.882zm15.21-8.264a1.133 1.133 0 0 0-.034-.078 16.874 16.874 0 0 0-6.1-6.886A16.778 16.778 0 0 0 15.282 0c-3.23 0-6.369.918-9.076 2.654A16.874 16.874 0 0 0 .12 9.51a1.06 1.06 0 0 0-.015.95 16.873 16.873 0 0 0 6.1 6.887A16.778 16.778 0 0 0 15.28 20c3.23 0 6.37-.918 9.077-2.654a16.874 16.874 0 0 0 6.1-6.886c.126-.264.138-.57.033-.842z"/></g><g><path fill="#fa0" d="M15.281 12.53a2.533 2.533 0 0 1-2.53-2.53 2.533 2.533 0 0 1 2.53-2.53 2.533 2.533 0 0 1 2.53 2.53 2.533 2.533 0 0 1-2.53 2.53zm0-7.179A4.654 4.654 0 0 0 10.633 10a4.654 4.654 0 0 0 4.648 4.648A4.654 4.654 0 0 0 19.93 10a4.654 4.654 0 0 0-4.649-4.649z"/></g></g></g></svg>
                    </span>
                        Просмотренные товары
                    </div>
                    <div class="custom_nuvbar_wrapper">
                        <button class="v-prev">
                            <span class="v-prev-icon icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="22" viewBox="0 0 12 22"><g><g><path fill="#313131" d="M11.692 21.883c.3-.3.3-.785 0-1.085L2.13 11.255l9.562-9.562A.767.767 0 1 0 10.607.608L.52 10.694a.748.748 0 0 0-.224.542.781.781 0 0 0 .224.543l10.086 10.086a.752.752 0 0 0 1.085.018z"/></g></g></svg>
                            </span>
                        </button>
                        <button class="v-next">
                            <span class="v-next-icon icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="22" viewBox="0 0 12 22"><g><g><path fill="#313131" d="M.388 21.883c-.3-.3-.3-.785 0-1.085l9.561-9.543L.388 1.693A.767.767 0 1 1 1.473.608L11.56 10.694a.748.748 0 0 1 .224.542.781.781 0 0 1-.224.543L1.473 21.864a.752.752 0 0 1-1.085.02z"/></g></g></svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="custom_row">
                <div class="column">
                    <div class="popular_slder_wrapper">
                        <div class="p-slider">

                            <?php foreach ($products as $product): ?>
                                <div class="p-slider-item">
                                    <?= $this->render('../../../views/layouts/_product-card', [
                                        'product' => $product
                                    ]); ?>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>