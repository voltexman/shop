<?php

namespace shop\entities\other\contacts;


use yii\db\ActiveRecord;


/**
 * @property integer $id
 * @property string $email
 */
class Email extends ActiveRecord
{

    public function edit($email): void
    {
        $this->email = $email;
    }



    public static function tableName(): string
    {
        return '{{%contact_emails}}';
    }


}