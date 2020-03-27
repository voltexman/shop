<?php

namespace shop\forms\shop\search;


use shop\entities\shop\Brand;
use shop\entities\shop\Category;
use shop\entities\shop\Characteristic;
use shop\forms\CompositeForm;
use yii\helpers\ArrayHelper;


/**
 * @property ValueForm[] $values
 */

class CatalogForm extends CompositeForm
{
    public $category;
    public $brands;
    public $label;
    public $from;
    public $to;


    private $maxPrice;

    public function __construct($maxPrice, array $config = [])
    {
        $this->maxPrice = $maxPrice;
        $this->values = array_map(function (Characteristic $characteristic) {
            return new ValueForm($characteristic);
        }, Characteristic::find()->orderBy('sort')->all());
        parent::__construct($config);
    }


    public function isChangePriceRange(): bool
    {
        return $this->from > 0 || $this->to < $this->maxPrice;
    }


    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    public function rules(): array
    {
        return [
            [['category', 'from', 'to'], 'integer'],
            ['brands', 'each', 'rule' => ['integer']],
            ['label', 'each', 'rule' => ['integer']],
        ];
    }

    public function categoriesList(): array
    {
        return Category::find()->where(['>', 'depth', 0])->orderBy('lft')->all();
    }


    public function brandsList(): array
    {
        return ArrayHelper::map(Brand::find()->orderBy('name')->asArray()->all(), 'id', 'name');
    }


    public function getCategoryById($id) : Category
    {
        return Category::findOne($id);
    }


    public function formName(): string
    {
        return '';
    }

    protected function internalForms(): array
    {
        return ['values'];
    }

}
