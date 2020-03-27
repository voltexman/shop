<?php

use yii\helpers\Html;

$this->title = 'О нас';

/* @var $this yii\web\View */
/* @var $aboutUs \shop\entities\other\AboutUs */

$this->params['breadcrumbs'][] = $this->title;
?>


<section class="s-content-text">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?= Yii::$app->formatter->asHtml($aboutUs->description, [
                    'Attr.AllowedRel' => array('nofollow'),
                    'HTML.SafeObject' => true,
                    'Output.FlashCompat' => true,
                    'HTML.SafeIframe' => true,
                    'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
                ]) ?>
            </div>
        </div>

        <?php if (!empty($aboutUs->photos)): ?>
            <div class="row">
                <div class="col">
                    <div class="galery">
                        <h2>Фотогаллерея</h2>
                        <div class="custom-galery-row">
                            <?php foreach ($aboutUs->photos as $photo): ?>

                                <div class="custom-galery-col">
                                    <a data-fancybox="gallery" href="<?= $photo->getThumbFileUrl('file', 'origin') ?>">
                                        <img src="<?= $photo->getThumbFileUrl('file', 'thumb') ?>" alt="<?= Html::encode($photo->file) ?>">
                                    </a>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

