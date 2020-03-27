<?php

namespace shop\forms\manage\shop\product;

use shop\entities\shop\product\AnswerReview;
use yii\base\Model;

class AnswerReviewEditForm extends Model
{
    public $text;

    public function __construct(AnswerReview $answer = null, $config = [])
    {
        if ($answer){
            $this->text = $answer->text;
        }
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['text'], 'required'],
            [['text'], 'string'],
        ];
    }


}