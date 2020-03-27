<?php

namespace shop\forms\shop\order;

use yii\base\Model;


class CustomerForm extends Model
{
    public $phone;
    public $first_name;
    public $last_name;
    public $city;
    public $department_post;


    public function rules(): array
    {
        return [
            [['phone', 'first_name', 'city'], 'required'],
            ['phone', 'replacePhone'],
            [['phone', 'first_name', 'last_name', 'city'], 'string', 'max' => 255],
            [['department_post'], 'integer'],
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
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'city' => 'Город',
            'department_post' => 'Отделения новой почты',
        ];
    }

}