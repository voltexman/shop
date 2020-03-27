<?php

namespace shop\entities\other\carousel;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use shop\services\MyImageUploadBehavior;

/**
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $link
 *
 *
 * @mixin MyImageUploadBehavior
 */
class Carousel extends ActiveRecord
{



    public static function create($title, $link): self
    {
        $article = new static();
        $article->title = $title;
        $article->link = $link;
        return $article;
    }

    public function edit($title, $link): void
    {
        $this->title = $title;
        $this->link = $link;
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
        Yii::$app->db->createCommand("UPDATE carousel SET image = NULL WHERE id = {$this->id}")->execute();
    }



    ##########################

    public static function tableName(): string
    {
        return '{{%carousel}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => MyImageUploadBehavior::class,
                'attribute' => 'image',
                'createThumbsOnRequest' => true,
                'filePath' => '@staticRoot/origin/carousel/[[attribute_id]]/[[id]].[[extension]]',
                'fileUrl' => '@static/origin/carousel/[[attribute_id]]/[[id]].[[extension]]',
                'thumbPath' => '@staticRoot/cache/carousel/[[attribute_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbUrl' => '@static/cache/carousel/[[attribute_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbs' => [
                    'admin' => ['width' => 100, 'height' => 70],
                    'thumb' => ['width' => 640, 'height' => 480],
                    'origin' => ['width' => 1920, 'height' => 750],
                ],
            ],
        ];
    }


}