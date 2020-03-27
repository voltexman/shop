<?php
namespace shop\forms\manage\other\carousel;



use shop\entities\other\carousel\Carousel;
use yii\base\Model;
use yii\web\UploadedFile;

class CarouselForm extends Model
{
    public $title;
    public $link;

    /**
     * @var  UploadedFile $image
     */
    public $image;

    private $_carousel;

    public function __construct(Carousel $carousel = null, $config = [])
    {
        if ($carousel) {
            $this->title = $carousel->title;
            $this->link = $carousel->link;
            $this->_carousel = $carousel;
        }
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['title', 'link'], 'required'],
            [['title', 'link'], 'string', 'max' => 255],
            ['link', 'url'],
            ['image', 'file', 'extensions' => 'jpeg ,jpg, png', 'mimeTypes' => 'image/jpeg, image/png'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'link' => 'Ссылка',
            'image' => 'Изображение',
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



}