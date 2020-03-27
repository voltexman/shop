<?php

namespace shop\entities\shop;

use shop\entities\behaviors\MetaBehavior;
use shop\entities\Meta;
use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use shop\services\MyImageUploadBehavior;

/**
 * @property integer $id
 * @property string $name
 * @property boolean $show_in_index
 * @property string $image
 * @property string $meta_json

 * @property Meta $meta
 * @mixin MyImageUploadBehavior
 */
class Brand extends ActiveRecord
{
    public $meta;

    public static function create($name, $showInIndex, Meta $meta): self
    {
        $brand = new static();
        $brand->name = $name;
        $brand->show_in_index = $showInIndex;
        $brand->meta = $meta;
        return $brand;
    }

    public function edit($name, $showInIndex, Meta $meta): void
    {
        $this->name = $name;
        $this->show_in_index = $showInIndex;
        $this->meta = $meta;
    }

    public function getSeoTitle(): string
    {
        return $this->meta->title ?: $this->name;
    }

    // Photos

    public function addPhoto(UploadedFile $file): void
    {
        $this->image = $file;
    }


    public function removePhoto(): void
    {
        $this->cleanFiles();
        unset($this->image);
        $this->image = null;
        Yii::$app->db->createCommand("UPDATE shop_brands SET image = NULL WHERE id = {$this->id}")->execute();
    }


    ##########################

    public static function tableName(): string
    {
        return '{{%shop_brands}}';
    }

    public function behaviors(): array
    {
        return [
            MetaBehavior::class,
            [
                'class' => MyImageUploadBehavior::class,
                'attribute' => 'image',
                'createThumbsOnRequest' => true,
                'filePath' => '@staticRoot/origin/brand/[[attribute_id]]/[[id]].[[extension]]',
                'fileUrl' => '@static/origin/brand/[[attribute_id]]/[[id]].[[extension]]',
                'thumbPath' => '@staticRoot/cache/brand/[[attribute_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbUrl' => '@static/cache/brand/[[attribute_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbs' => [
                    'admin' => ['width' => 100, 'height' => 70],
                    'thumb' => ['width' => 240, 'height' => 90],
                    'origin' => ['width' => 800, 'height' => 400],
                ],
            ],
        ];
    }


}