<?php

use shop\entities\shop\order\Order;
use shop\helpers\OrderHelper;
use shop\helpers\PriceHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $order \shop\entities\shop\order\Order  */

?>
<div class="order-create">
    <h2>Заказ № <?= Html::encode($order->id) ?></h2>

    <div class="oder-detail">
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
                    'value' => OrderHelper::getStatusText($order->current_status),
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
                    'label' => 'Отделения новой почты',
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
                ],
            ],
        ]) ?>
    </div>


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

                        <?php if (!empty($item->modification_name)): ?>
                            <small> <?= $item->modification_name ?></small><br>
                        <?php endif; ?>

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
