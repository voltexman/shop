<?php

namespace shop\entities\shop\product;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use shop\entities\user\User;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property int $vote
 * @property string $text
 * @property bool $active
 * @property int $created_at
 *
 * @property Product $product
 * @property User $user
 * @property AnswerReview[] $answers
 */

class Review extends ActiveRecord
{

    public static function create($userId, $vote, string $text): self
    {
        $review = new static();
        $review->user_id = $userId;
        $review->vote = $vote;
        $review->text = $text;
        $review->created_at = time();
        $review->active = true;
        return $review;
    }

    public function edit($text): void
    {
        $this->text = $text;
    }

    public function activate(): void
    {
        $this->active = true;
    }

    public function draft(): void
    {
        $this->active = false;
    }

    public function isShowRating() :bool
    {
        return $this->vote > 0;
    }

    public function isActive(): bool
    {
        return $this->active == true;
    }

    public function getRating(): int
    {
        return $this->vote;
    }

    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }

    public function hasAnswers() :bool
    {
        return $this->answers != null;
    }

    public function getVote() :int
    {
        return round($this->vote,0,PHP_ROUND_HALF_DOWN);
    }


    // Answers

    public function addAnswer($userId, $text): void
    {
        $answers = $this->answers;
        $answers[] = AnswerReview::create($userId, $text);
        $this->answers = $answers;
    }


    public function editAnswer($id, $text): void
    {
        $answers = $this->answers;
        foreach ($answers as $i => $answer) {
            if ($answer->isIdEqualTo($id)) {
                $answers[$i]->edit($text);
                $this->answers = $answers;
                return;
            }
        }
        throw new \DomainException('Answer is not found.');
    }


    public function removeAnswer($id): void
    {
        $answers = $this->answers;
        foreach ($answers as $i => $answer) {
            if ($answer->isIdEqualTo($id)) {
                unset($answers[$i]);
                $this->answers = $answers;
                return;
            }
        }
        throw new \DomainException('Answer is not found.');
    }

    ###########################

    public function getProduct(): ActiveQuery
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getAnswers(): ActiveQuery
    {
        return $this->hasMany(AnswerReview::class, ['review_id' => 'id']);
    }

    ###########################

    public function behaviors(): array
    {
        return [
            [
                'class' => SaveRelationsBehavior::class,
                'relations' => ['answers'],
            ],
        ];
    }


    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }


    public static function tableName(): string
    {
        return '{{%shop_reviews}}';
    }


}