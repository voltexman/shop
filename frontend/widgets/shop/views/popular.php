<?php

/** @var $this yii\web\View */
/** @var $products shop\entities\shop\product\Product[] */

?>


<?php if ($products): ?>
    <section class="s-popular">
        <div class="container">
            <div class="custom_row">
                <div class="title_column column">
                    <div class="column-title">
                        <span class="view_icon icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="20" viewBox="0 0 17 20"><g><g><path fill="#ff3939" d="M5.742 16.15c0-1.326 1.044-2.811 1.943-3.814.36.81.964 1.382 1.485 1.876.755.716 1.182 1.159 1.182 1.938a2.298 2.298 0 0 1-2.279 2.287l-.106-.001-.022-.001-.022-.001a2.298 2.298 0 0 1-2.18-2.284zm6.91-10.673c-1.54-1.409-2.87-2.625-2.87-4.696a.781.781 0 0 0-1.199-.66L8.46.2C7.683.688 5.62 1.985 3.716 3.945 1.25 6.483 0 9.14 0 11.844c0 4.401 3.49 7.999 7.84 8.15.068.004.137.006.207.006h.078c2.01 0 3.94-.741 5.437-2.087a.781.781 0 0 0-1.045-1.162 6.59 6.59 0 0 1-.801.616c.128-.382.198-.792.198-1.217 0-1.49-.886-2.33-1.669-3.072-.736-.698-1.317-1.25-1.317-2.297a.781.781 0 0 0-1.287-.595c-.141.12-3.461 2.972-3.461 5.964 0 .372.053.732.153 1.072a6.6 6.6 0 0 1-2.77-5.378c0-3.3 2.408-6.724 6.808-9.72.171.735.49 1.431.96 2.104.632.907 1.462 1.667 2.265 2.402 1.582 1.447 3.076 2.815 3.091 5.219a6.529 6.529 0 0 1-.246 1.824.781.781 0 1 0 1.503.427c.208-.732.31-1.493.306-2.261-.02-3.086-1.921-4.827-3.599-6.362z"/></g></g></svg>
                        </span>
                        Популярные товары
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