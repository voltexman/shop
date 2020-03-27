<?php

namespace shop\forms\shop\search;

use yii\base\Model;


class SearchForm extends Model
{
    public $text;


    public function rules(): array
    {
        return [
            [['text'], 'string'],
        ];
    }


}
