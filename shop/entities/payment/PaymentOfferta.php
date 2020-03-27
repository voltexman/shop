<?php

namespace shop\entities\payment;


use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $title
 * @property string $description
 *
 */

class PaymentOfferta extends ActiveRecord
{
    public function edit($title, $description): void
    {
        $this->title = $title;
        $this->description = $description;
    }


    public static function tableName(): string
    {
        return '{{%payment_offerta}}';
    }
}