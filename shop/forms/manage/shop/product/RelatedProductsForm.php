<?php

namespace shop\forms\manage\shop\product;


use shop\entities\shop\product\Product;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class RelatedProductsForm extends Model
{
    public $relatedProducts = [];

    private $_product;
    public function __construct(Product $product, $config = [])
    {
        $this->_product = $product;
        if ($product) {
            $this->relatedProducts = ArrayHelper::getColumn($product->relatedAssignments, 'related_id');
        }
        parent::__construct($config);
    }

    public function productsList()
    {
        return ArrayHelper::map(Product::find()->where(['!=', 'id', $this->_product->id])->orderBy('name')->asArray()->all(), 'id', 'name');
    }

    public function rules(): array
    {
        return [
            ['relatedProducts', 'each', 'rule' => ['integer']],
        ];
    }

    public function beforeValidate(): bool
    {
        $this->relatedProducts = array_filter((array)$this->relatedProducts);
        return parent::beforeValidate();
    }

    public function attributeLabels()
    {
        return [
            'relatedProducts' => 'Связаные товары',
        ];
    }

}