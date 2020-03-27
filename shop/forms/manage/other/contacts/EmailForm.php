<?php

namespace shop\forms\manage\other\contacts;

use shop\entities\other\contacts\Email;
use yii\base\Model;


class EmailForm extends Model
{

    public $emailText;

    private $_email;

    public function __construct(Email $email = null, $config = [])
    {
        if ($email) {
            $this->emailText = $email->email;
            $this->_email = $email;
        }
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['emailText'], 'required'],
            [['emailText'], 'email'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'emailText' => 'Почта',
        ];
    }


}