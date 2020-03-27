<?php

namespace shop\forms\manage\other\contacts;

use shop\entities\other\contacts\Phone;
use yii\base\Model;


class PhoneForm extends Model
{

    public $text;

    private $_phone;

    public function __construct(Phone $phone = null, $config = [])
    {
        if ($phone) {
            $this->text = $phone->text;
            $this->_phone = $phone;
        }
        parent::__construct($config);
    }


    public function rules(): array
    {
        return [
            [['text'], 'required'],
            [['text'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'text' => 'Телефон',
        ];
    }


}