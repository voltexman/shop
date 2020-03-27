<?php

namespace shop\forms\shop;


use yii\base\Model;

class ReviewForm extends Model
{
    public $vote = 0;
    public $userId;
    public $text;

    public function rules(): array
    {
        return [
            [['text', 'userId'], 'required'],
            [['vote'], 'in', 'range' => $this->votesList()],
            [['text'], 'string'],
            [['userId'], 'integer'],
        ];
    }

    public function votesList(): array
    {
        return [0,1,2,3,4,5];
    }


    public function attributeLabels()
    {
        return [
            'userId' => 'Пользователь',
            'vote' => 'Оценка',
            'text' => 'Отзыв',
        ];
    }


}