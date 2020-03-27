<?php

use shop\entities\shop\order\Order;
use shop\helpers\OrderHelper;
use shop\helpers\PriceHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $order shop\entities\shop\order\Order */

$this->title = 'Заказ ' . $order->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $order->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $order->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $order,
                'attributes' => [
                    [
                        'label' => 'Дата создания',
                        'attribute' => 'created_at',
                        'format' => 'datetime'
                    ],
                    [
                        'label' => 'Статус',
                        'attribute' => 'current_status',
                        'value' => OrderHelper::statusLabelForSearch($order->current_status),
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Телефон',
                        'attribute' => 'customerData.phone',
                    ],
                    [
                        'label' => 'Имя',
                        'attribute' => 'customerData.first_name',
                    ],
                    [
                        'label' => 'Фамилия',
                        'attribute' => 'customerData.last_name',
                    ],
                    [
                        'label' => 'Город заказчика',
                        'attribute' => 'customerData.city',
                    ],
                    [
                        'label' => 'Отделения Новой почты',
                        'attribute' => 'customerData.department_post',
                    ],
                    [
                        'label' => 'Общая стоимость',
                        'attribute' => 'cost',
                        'value' => function (Order $model) {
                            return $model->cost . ' грн.';
                        },
                    ],
                    [
                        'label' => 'Комментарий',
                        'attribute' => 'note',
                        'format' => 'ntext'
                    ],
                ],
            ]) ?>
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="margin-bottom: 0">
                    <thead>
                    <tr>
                        <th class="text-left">Название товара</th>
                        <th class="text-left">К-тво (шт)</th>
                        <th class="text-left">Цена (грн.)</th>
                        <th class="text-right">Общая стоимость (грн.)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($order->items as $item): ?>
                        <tr>
                            <td class="text-left">
                                <?= Html::encode($item->product_name) ?>
                                <br>

                                <small><?=  $item->modification_name?></small>

                            </td>
                            <td class="text-left">
                                <?= $item->quantity ?>
                            </td>
                            <td class="text-right"><?= PriceHelper::format($item->price) ?></td>
                            <td class="text-right"><?= PriceHelper::format($item->getCost()) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="margin-bottom: 0">
                    <thead>
                    <tr>
                        <th class="text-left">Дата изменения</th>
                        <th class="text-left">Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($order->statuses as $status): ?>
                        <tr>
                            <td class="text-left">
                                <?= Yii::$app->formatter->asDatetime($status->created_at) ?>
                            </td>
                            <td class="text-left">
                                <?= OrderHelper::statusLabelForSearch($status->value) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
