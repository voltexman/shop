<?php

namespace shop\entities\other\contacts;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $text
 *
 */
class Phone extends ActiveRecord
{

    public static function create($text): self
    {
        $object = new static();
        $object->text = $text;
        return $object;
    }


    public function edit($text): void
    {
        $this->text = $text;
    }



    public static function tableName(): string
    {
        return '{{%contact_phones}}';
    }
}