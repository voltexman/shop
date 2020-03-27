<?php

use shop\helpers\ProductHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $brand \shop\entities\shop\Brand */



$this->title = $brand->name;
$this->params['breadcrumbs'][] = ['label' => 'Все бренды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $brand->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $brand->id], [
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
                        'model' => $brand,
                        'attributes' => [
                            [
                                'label' => 'Название',
                                'attribute' => 'name',
                            ],
                            [
                                'label' => 'Показывать на главной странице',
                                'attribute' => 'show_in_index',
                                'value' => ProductHelper::showInIndexName($brand->show_in_index),
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
                <?php if ($brand->image): ?>
                    <div class="col-md-2 col-xs-3" style="text-align: center">
                        <div>
                            <?= Html::a(
                                Html::img($brand->getThumbFileUrl('image', 'thumb')),
                                $brand->getUploadedFileUrl('image'),
                                ['class' => 'thumbnail', 'target' => '_blank']
                            ) ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>


    <div class="box">
        <div class="box-header with-border">SEO</div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $brand,
                'attributes' => [
                    [
                        'attribute' => 'meta.title',
                        'value' => $brand->meta->title,
                    ],
                    [
                        'attribute' => 'meta.description',
                        'value' => $brand->meta->description,
                    ],
                    [
                        'attribute' => 'meta.keywords',
                        'value' => $brand->meta->keywords,
                    ],
                ],
            ]) ?>
        </div>
    </div>



</div>
