<?php


use shop\entities\shop\product\Review;
use shop\helpers\ReviewHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $searchModel backend\forms\shop\ReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">



    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'label' => 'Товар',
                        'attribute' => 'product',
                        'value' => function (Review $model) {
                            return Html::a(Html::encode($model->product->name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Пользователь',
                        'value' => function (Review $model) {
                            return Html::a(Html::encode($model->user->getUsername()), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Текст',
                        'attribute' => 'text',
                        'value' => function (Review $model) {
                            return StringHelper::truncate($model->text, 25);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'created_at',
                        'label' => 'Дата создания',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'date_from',
                            'attribute2' => 'date_to',
                            'type' => DatePicker::TYPE_RANGE,
                            'separator' => '-',
                            'pluginOptions' => [
                                'todayHighlight' => true,
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                            ],
                        ]),
                        'format' => 'datetime',
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Действия'
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
