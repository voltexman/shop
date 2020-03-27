<?php

namespace shop\forms\manage\other\contacts;

use shop\entities\other\contacts\Address;
use yii\base\Model;


class AddressForm extends Model
{

    public $text;

    private $_address;

    public function __construct(Address $address = null, $config = [])
    {
        if ($address) {
            $this->text = $address->text;
            $this->_address = $address;
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
            'text' => 'Адрес',
        ];
    }


}