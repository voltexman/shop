<?php

namespace shop\forms\shop;


use shop\forms\manage\shop\Model;


class CallMeasurerForm extends Model
{
    public $phone;


    public function rules(): array
    {
        return [
            [['phone'], 'required'],
            ['phone', 'replacePhone'],
            [['phone'], 'string', 'max' => 255],
        ];
    }


    public function replacePhone()
    {
        $this->phone = str_replace(" ", "", $this->phone);
    }


    public function attributeLabels()
    {
        return [
            'phone' => 'Телефон',
        ];
    }

}