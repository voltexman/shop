<?php

/** @var $products shop\entities\shop\product\Product[] */


?>

<?php if (!empty($products)): ?>
    <section class="s-similar-works">
        <div class="container">
            <div class="row small-title-row">
                <div class="col-12">
                    <h2 class="h2">
                        Похожее товары
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 new-slider-col">
                    <div class="small_nav-for-slider">
                        <button class="similar-prev">
                            <span class="small_arrow-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="7" height="12" viewBox="0 0 7 12"><defs><path id="5kp2a" d="M1702.234 787.762a.42.42 0 0 0 0-.593l-5.23-5.221 5.23-5.231a.42.42 0 1 0-.593-.594l-5.518 5.518a.41.41 0 0 0-.123.297c0 .11.045.217.123.296l5.518 5.518a.411.411 0 0 0 .593.01z"></path></defs><g><g transform="translate(-1696 -776)"><use fill="#b7b7b7" xlink:href="#5kp2a"></use></g></g></svg>
                            </span>
                        </button>
                        <button class="similar-next">
                            <span class="small_arrow-next">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="7" height="12" viewBox="0 0 7 12"><defs><path id="znnla" d="M1728.33 788a.42.42 0 0 1 0-.595l5.23-5.22-5.23-5.231a.42.42 0 1 1 .593-.594l5.518 5.518a.41.41 0 0 1 .122.296.427.427 0 0 1-.122.297l-5.518 5.518a.411.411 0 0 1-.594.01z"></path></defs><g><g transform="translate(-1728 -776)"><use fill="#b7b7b7" xlink:href="#znnla"></use></g></g></svg>
                            </span>
                        </button>
                    </div>
                    <div class="small-slider-col-wrapper">
                        <div class="similar-works-slider">
                            <?php foreach ($products as $product): ?>
                                <?= $this->render('../../../views/layouts/_product-similar', [
                                    'product' => $product,
                                ]) ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>