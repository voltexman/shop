<?php

namespace shop\forms\manage\other;


use shop\entities\other\AboutUs;
use yii\base\Model;



class AboutUsForm extends Model
{
    public $title;
    public $description;

    private $_aboutUs;

    public function __construct(AboutUs $aboutUs = null, $config = [])
    {
        if ($aboutUs){
            $this->title = $aboutUs->title;
            $this->description = $aboutUs->description;
            $this->_aboutUs = $aboutUs;
        }

        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
            ['description', 'string'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание',
        ];
    }


}