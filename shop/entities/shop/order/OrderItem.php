<?php

namespace shop\entities\shop\order;

use shop\entities\shop\product\Product;
use yii\db\ActiveRecord;


/**
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $modification_id
 * @property string $product_name
 * @property string $modification_name
 * @property int $price
 * @property int $quantity
 *
 */


class OrderItem extends ActiveRecord
{


    public static function create(Product $product, $modificationId, $price, $quantity)
    {
        $item = new static();
        $item->product_id = $product->id;
        $item->product_name = $product->name;
        if ($modificationId) {
            $modification = $product->getModification($modificationId);
            $item->modification_id = $modification->id;
            $item->modification_name = $modification->name;
        }
        $item->price = $price;
        $item->quantity = $quantity;
        return $item;
    }

    public function getCost(): int
    {
        return $this->price * $this->quantity;
    }


    public static function tableName(): string
    {
        return '{{%shop_order_items}}';
    }


}