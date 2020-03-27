<?php

namespace shop\entities\other;


use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $title
 * @property string $description
 */

class Guarantee extends ActiveRecord
{

    public function edit($title, $description): void
    {
        $this->title = $title;
        $this->description = $description;
    }


    public static function tableName(): string
    {
        return '{{%guarantees}}';
    }



}