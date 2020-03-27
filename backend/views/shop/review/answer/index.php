<?php

use shop\entities\shop\product\AnswerReview;
use shop\entities\shop\product\Review;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model AnswerReview */
/* @var $review Review */


?>
<div class="user-index">

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'label' => 'Имя пользователя',
                        'value' => function(AnswerReview $model ){
                            return $model->user->getUsername();
                        },
                    ],
                    [
                        'attribute' => 'text',
                        'label' => 'Текст',
                        'format' => 'ntext',
                    ],
                    [
                        'attribute' => 'created_at',
                        'label' => 'Дата создания',
                        'format' => 'datetime',
                    ],
                    [
                        'class' => ActionColumn::class,
                        'header' => 'Действия',
                        'headerOptions' => ['style' => 'color:#337ab7;'],
                        'template' => '{update}{delete}',
                        'urlCreator' => function ($action, $model, $key, $index)  use ($review) {
                            if ($action === 'update') {
                                $url = Url::to(['update-answer', 'id' => $review->id, 'answer_id' => $model->id]);
                                return $url;
                            }
                            if ($action === 'delete') {
                                $url = Url::to(['delete-answer', 'id' => $review->id, 'answer_id' => $model->id]);
                                return $url;
                            }
                        },
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
