<?php

namespace shop\forms\manage\shop\order;

use shop\entities\shop\order\Order;
use yii\base\Model;
use shop\helpers\OrderHelper;


class OrderEditForm extends Model
{
    public $status;

    public function __construct(Order $order, array $config = [])
    {
        $this->status = $order->current_status;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['status'], 'required'],
            [['status'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'status' => 'Статус',
        ];
    }

    public function statusListForEdit()
    {
        return OrderHelper::statusListForEdit();
    }

}