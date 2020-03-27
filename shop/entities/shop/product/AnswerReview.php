<?php

namespace shop\entities\shop\product;

use shop\entities\user\User;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int $review_id
 * @property int $user_id
 * @property string $text
 * @property int $created_at
 *
 * @property Review $review
 * @property User $user
 */
class AnswerReview extends ActiveRecord
{
    public static function create($userId, string $text): self
    {
        $answer = new static();
        $answer->user_id = $userId;
        $answer->text = $text;
        $answer->created_at = time();
        return $answer;
    }

    public function edit($text): void
    {
        $this->text = $text;
    }


    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }



    public function getUsername(): string
    {
        $role = array_key_first(Yii::$app->authManager->getRolesByUser($this->user_id));
        return ($role === 'admin' || $role === 'moderator') ? 'Администратор' : $this->user->getUsername();
    }


    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getReview(): ActiveQuery
    {
        return $this->hasOne(Review::class, ['id' => 'review_id']);
    }


    public static function tableName(): string
    {
        return '{{%shop_review_answers}}';
    }
}