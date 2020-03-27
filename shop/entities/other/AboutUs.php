<?php

namespace shop\entities\other;


use yii\db\ActiveRecord;


/**
 * @property integer $id
 * @property string $title
 * @property string $description
 *
*/

class AboutUs extends ActiveRecord
{

    public function edit($title, $description): void
    {
        $this->title = $title;
        $this->description = $description;
    }


    public static function tableName(): string
    {
        return '{{%about_us}}';
    }


}