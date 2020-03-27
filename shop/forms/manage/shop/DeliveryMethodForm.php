<?php

namespace shop\forms\manage\shop;

use shop\entities\shop\DeliveryMethod;
use yii\base\Model;

class DeliveryMethodForm extends Model
{
    public $name;
    public $cost;
    public $sort;

    public function __construct(DeliveryMethod $method = null, $config = [])
    {
        if ($method) {
            $this->name = $method->name;
            $this->cost = $method->cost;
            $this->sort = $method->sort;
        } else {
            $this->sort = DeliveryMethod::find()->max('sort') + 1;
        }
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['name', 'cost', 'sort'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['cost', 'sort'], 'integer', 'min' => 0],
        ];
    }


    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'cost' => 'Стоимость доставки',
            'sort' => 'Сортировка',
        ];
    }

}