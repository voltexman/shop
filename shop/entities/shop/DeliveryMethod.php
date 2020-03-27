<?php

namespace shop\entities\shop;


use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 * @property int $cost
 * @property int $sort
 */

class DeliveryMethod extends ActiveRecord
{
    public static function create($name, $cost, $sort): self
    {
        $method = new static();
        $method->name = $name;
        $method->cost = $cost;
        $method->sort = $sort;
        return $method;
    }

    public function edit($name, $cost, $sort): void
    {
        $this->name = $name;
        $this->cost = $cost;
        $this->sort = $sort;
    }

    public static function tableName(): string
    {
        return '{{%shop_delivery_methods}}';
    }

}