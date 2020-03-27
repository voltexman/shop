<?php


/* @var $carousel shop\entities\other\carousel\Carousel[] */

use yii\helpers\Html;

?>

<?php if (!empty($carousel)): ?>
    <section class="s-main-slider">
        <div class="container">
            <div class="custom_row">
                <div class="main-slider-column column">
                    <div class="main-slider-column-wrapper">
                        <div class="m-slider">
                            <?php foreach ($carousel as $carouselItem): ?>
                                <div class="m-slider-item">
                                    <div class="m-slider-item-wrapper">
                                        <div class="m-slider-item-image" style="background-image: url('<?= $carouselItem->image ? $carouselItem->getThumbFileUrl('image', 'origin') : ''?>')"></div>
                                        <div class="m-slider-item-content">
                                            <div class="products_name">
                                                <a href="<?= Html::encode($carouselItem->link) ?>">
                                                    <?= Html::encode($carouselItem->title) ?>
                                                </a>
                                            </div>
                                            <div class="products_link">
                                                <a href="<?= Html::encode($carouselItem->link) ?>" class="yellow_link">
                                                    Смотреть коллекцию
                                                    <span class="arrow_icon icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="10" viewBox="0 0 20 10"><g><g><path fill="#ffd500" d="M19.696 4.5L15.73.538a.512.512 0 0 0-.726 0 .512.512 0 0 0 0 .726l3.088 3.09H.516a.516.516 0 1 0 0 1.032h17.576l-3.088 3.08a.512.512 0 0 0 .365.877c.134 0 .264-.05.365-.15L19.7 5.225a.516.516 0 0 0-.004-.726z"/></g></g></svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="m-navigation_wrap m-nav-left">
                            <button class="m-prev">
                                <span class="m-arrow_right icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="30" viewBox="0 0 17 30"><g><g><path fill="#fff" d="M15.93.307a1.06 1.06 0 0 1 0 1.499L2.725 14.986 15.93 28.19a1.06 1.06 0 1 1-1.499 1.499L.502 15.76a1.034 1.034 0 0 1-.31-.749c.002-.28.113-.55.31-.75L14.432.334A1.038 1.038 0 0 1 15.93.307z"/></g></g></svg>
                                </span>
                            </button>
                        </div>
                        <div class="m-navigation_wrap m-nav-right">
                            <button class="m-next">
                                <span class="m-arrow_left icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="30" viewBox="0 0 16 30"><g><g><path fill="#fff" d="M.286.307a1.06 1.06 0 0 0 0 1.499l13.206 13.18L.286 28.19a1.06 1.06 0 1 0 1.5 1.499l13.928-13.93c.201-.196.313-.467.31-.749a1.079 1.079 0 0 0-.31-.75L1.785.334A1.038 1.038 0 0 0 .286.307z"/></g></g></svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
