<?php

namespace shop\forms\manage\shop\product;

use shop\entities\shop\Brand;
use shop\entities\shop\Category;
use shop\entities\shop\Characteristic;
use shop\entities\shop\product\Product;
use shop\forms\CompositeForm;
use shop\forms\manage\MetaForm;
use yii\helpers\ArrayHelper;

/**
 * @property MetaForm $meta
 * @property ValueForm[] $values
 *
 */
class ProductEditForm extends CompositeForm
{
    public $brandId;
    public $categoryId;
    public $code;
    public $name;
    public $description;
    public $label;
    public $showInIndex;

    private $_product;

    public function __construct(Product $product, $config = [])
    {
        $this->brandId = $product->brand_id;
        $this->categoryId = $product->category_id;
        $this->code = $product->code;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->label = $product->label;
        $this->showInIndex = $product->show_in_index;
        $this->meta = new MetaForm($product->meta);
        $this->values = array_map(function (Characteristic $characteristic) use ($product) {
            return new ValueForm($characteristic, $product->getValue($characteristic->id));
        }, Characteristic::find()->orderBy('sort')->all());
        $this->_product = $product;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['brandId', 'categoryId', 'code', 'name'], 'required'],
            [['brandId', 'categoryId', 'label'], 'integer'],
            [['showInIndex'], 'boolean'],
            [['code', 'name'], 'string', 'max' => 255],
            [['code'], 'unique', 'targetClass' => Product::class, 'filter' => $this->_product ? ['<>', 'id', $this->_product->id] : null],
            ['description', 'string'],
        ];
    }

    public function brandsList(): array
    {
        return ArrayHelper::map(Brand::find()->orderBy('name')->asArray()->all(), 'id', 'name');
    }

    public function categoriesList(): array
    {
        return ArrayHelper::map(Category::find()->andWhere(['>', 'depth', 0])->orderBy('lft')->asArray()->all(), 'id', function (array $category) {
            return ($category['depth'] > 1 ? str_repeat('-- ', $category['depth'] - 1) . ' ' : '') . $category['name'];
        });
    }



    protected function internalForms(): array
    {
        return ['meta', 'values'];
    }


    public function attributeLabels()
    {
        return [
            'brandId' => 'Бренд',
            'categoryId' => 'Категория',
            'code' => 'Код',
            'name' => 'Название',
            'description' => 'Описание',
            'label' => 'Подпись (label)',
            'showInIndex' => 'Показывать на главном экране',
        ];
    }


}