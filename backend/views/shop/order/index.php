<?php

use shop\helpers\OrderHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
use shop\entities\shop\order\Order;

/* @var $this yii\web\View */
/* @var $searchModel \backend\forms\shop\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'attribute' => 'phone',
                        'label' => 'Телефон',
                        'value' => function (Order $model) {
                            return Html::a(Html::encode($model->customerData->phone), ['view', 'id' => $model->id]);
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
                        'attribute' => 'current_status',
                        'label' => 'Статус',
                        'filter' => OrderHelper::statusListForSearch(),
                        'value' => function (Order $order) {
                            return OrderHelper::statusLabelForSearch($order->current_status);
                        },
                        'format' => 'raw', //отключить фильтрацию через html encode
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Действия',
                        'template' => '{view}{delete}'
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
