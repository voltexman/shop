<?php

namespace shop\forms\manage\shop;

use shop\entities\shop\Brand;
use shop\forms\CompositeForm;
use shop\forms\manage\MetaForm;
use yii\web\UploadedFile;

/**
 * @property MetaForm $meta;
 */
class BrandForm extends CompositeForm
{
    public $name;
    public $showInIndex;

    /**
     * @var  UploadedFile $image
     */
    public $image;

    private $_brand;

    public function __construct(Brand $brand = null, $config = [])
    {
        if ($brand) {
            $this->name = $brand->name;
            $this->showInIndex = $brand->show_in_index;
            $this->meta = new MetaForm($brand->meta);
            $this->_brand = $brand;
        } else {
            $this->meta = new MetaForm();
        }
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['showInIndex'], 'boolean'],
            empty($this->_brand->image) ? ['image', 'required'] : ['image', 'file', 'extensions' => 'jpeg ,jpg, png', 'mimeTypes' => 'image/jpeg, image/png'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique', 'targetClass' => Brand::class, 'filter' => $this->_brand ? ['<>', 'id', $this->_brand->id] : null],
            ['image', 'file', 'extensions' => 'jpeg ,jpg, png', 'mimeTypes' => 'image/jpeg, image/png'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'name' => 'Названия',
            'showInIndex' => 'Показывать на главной странице',
        ];
    }

    public function beforeValidate(): bool
    {
        if (parent::beforeValidate()) {
            $this->image = UploadedFile::getInstance($this, 'image');
            return true;
        }
        return false;
    }

    public function internalForms(): array
    {
        return ['meta'];
    }
}