<?php

namespace shop\entities\other\contacts;


use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $text
 *
 */
class Address extends ActiveRecord
{


    public function edit($text): void
    {
        $this->text = $text;
    }


    public static function tableName(): string
    {
        return '{{%contact_addresses}}';
    }
}