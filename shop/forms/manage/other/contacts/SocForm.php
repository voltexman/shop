<?php

namespace shop\forms\manage\other\contacts;

use shop\entities\other\contacts\Soc;
use yii\base\Model;



class SocForm extends Model
{

    public $link;

    private $_soc;

    public function __construct(Soc $soc = null, $config = [])
    {
        if ($soc) {
            $this->link = $soc->link;
            $this->_soc = $soc;
        }
        parent::__construct($config);
    }


    public function rules(): array
    {
        return [
            [['link'], 'required'],
            [['link'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'link' => 'Ссылка',
        ];
    }


}