<?php

namespace shop\forms\shop;

use shop\entities\shop\product\Product;
use shop\entities\shop\product\Modification;
use shop\helpers\PriceHelper;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class AddToCartForm extends Model
{
    public $modification;
    public $quantity;

    private $_product;

    public function __construct(Product $product, $config = [])
    {
        $this->_product = $product;
        $this->quantity = 1;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return array_filter([
            ['quantity', 'required'],
            ['quantity', 'integer', 'max' => $this->_product->quantity],
            $this->_product->modifications ? ['modification', 'required'] : false,
            $this->_product->modifications ? ['modification', 'integer'] : false,

        ]);
    }

    public function modificationsList(): array
    {
        return ArrayHelper::map($this->_product->modifications, 'id', function (Modification $modification) {
            return $modification->name . ' (' . PriceHelper::format($modification->price ?: $this->_product->price_new) . ')';
        });
    }




    public function getProductImage()
    {
        if ($this->_product->main_photo_id){
            return $this->_product->mainPhoto->getThumbFileUrl('file', 'origin');
        }
        return false;
    }


    public function getProductName()
    {
        return $this->_product->name;
    }


    public function attributeLabels()
    {
        return [
            'quantity' => 'Количество',
            'modification' => 'Модификация'
        ];
    }


}