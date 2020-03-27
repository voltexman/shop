<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $carouselItem shop\entities\other\carousel\Carousel */



$this->title = $carouselItem->title;
$this->params['breadcrumbs'][] = ['label' => 'Слайдер', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $carouselItem->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $carouselItem->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">Общие</div>
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $carouselItem,
                        'attributes' => [
                            [
                                'label' => 'Заголовок',
                                'attribute' => 'title',
                            ],
                            [
                                'label' => 'Ссылка',
                                'attribute' => 'link',
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

    </div>



    <div class="box" id="photos">
        <div class="box-header with-border">Фото</div>
        <div class="box-body">

            <div class="row">
                <?php if ($carouselItem->image): ?>
                    <div class="col-md-2 col-xs-3" style="text-align: center">
                        <div>
                            <?= Html::a(
                                Html::img($carouselItem->getThumbFileUrl('image', 'origin')),
                                $carouselItem->getUploadedFileUrl('image'),
                                ['class' => 'thumbnail', 'target' => '_blank']
                            ) ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

</div>
