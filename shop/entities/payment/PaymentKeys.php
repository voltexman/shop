<?php

namespace shop\entities\payment;


use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $private_key
 * @property string $public_key
 *
 */

class PaymentKeys extends ActiveRecord
{
    public function edit($privateKey, $publicKey): void
    {
        $this->private_key = $privateKey;
        $this->public_key = $publicKey;
    }


    public static function tableName(): string
    {
        return '{{%payment_keys}}';
    }
}