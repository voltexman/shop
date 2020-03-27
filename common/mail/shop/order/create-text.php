<?php

use Yii;
use shop\helpers\OrderHelper;
/* @var $this yii\web\View */
/* @var $order \shop\entities\shop\order\Order  */


?>
Номер заказа <?= $order->id ?> ,
созданно: <?= \Yii::$app->formatter->asDatetime($order->created_at) ?>,
статус: <?= OrderHelper::getStatusText($order->current_status) ?>,
телефон: <?= $order->customerData->phone ?>,
Имя: <?= $order->customerData->first_name ?>,
Фамилия: <?= $order->customerData->last_name ?>,
Город: <?= $order->customerData->city ?>,
Отделение новой почты: <?= $order->customerData->department_post ?>,
Общая сума: <?= $order->cost ?> грн.,

Товары:
<?php foreach ($order->items as $item): ?>
    Название и код товара:  <?= $item->product_name . ' ' . $item->modification_name ?: '' ?>    ; К-тво: <?= $item->quantity ?>      ; Цена: <?= $item->price ?>     ; Сума: <?= $item->getCost() ?>     ;

<?php endforeach; ?>

