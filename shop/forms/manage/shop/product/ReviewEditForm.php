<?php

namespace shop\forms\manage\shop\product;

use shop\entities\shop\product\Review;
use yii\base\Model;

class ReviewEditForm extends Model
{
    public $text;

    public function __construct(Review $review, $config = [])
    {
        $this->text = $review->text;
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