<?php

namespace shop\forms\manage\other;


use shop\entities\other\Guarantee;
use yii\base\Model;


class GuaranteeForm extends Model
{
    public $title;
    public $description;

    private $_aboutUs;

    public function __construct(Guarantee $guarantee = null, $config = [])
    {
        if ($guarantee){
            $this->title = $guarantee->title;
            $this->description = $guarantee->description;
            $this->_aboutUs = $guarantee;
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