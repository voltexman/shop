<?php

namespace shop\entities\other\contacts;


use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 * @property string $link
 *
 */
class Soc extends ActiveRecord
{

    const TYPE_VIBER = 'viber';
    const TYPE_TELEGRAM = 'telegram';
    const TYPE_YOUTUBE = 'youtube';
    const TYPE_INSTAGRAM = 'instagram';
    const TYPE_FACEBOOK = 'facebook';



    public function edit($link): void
    {
        $this->link = $link;
    }


    public static function tableName(): string
    {
        return '{{%contact_socs}}';
    }
}