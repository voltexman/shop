<?php

namespace shop\forms\shop;

use yii\base\Model;

class AnswerReviewForm extends Model
{
    public $userId;
    public $reviewId;
    public $text;

    public function rules(): array
    {
        return [
            [['text', 'userId', 'reviewId'], 'required'],
            [['text'], 'string'],
            [['userId', 'reviewId'], 'integer'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'userId' => 'Пользователь',
            'reviewId' => 'Отзыв',
            'text' => 'Комментарий',
        ];
    }


}