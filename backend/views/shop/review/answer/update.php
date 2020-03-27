<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $answerReviewEditForm shop\forms\manage\shop\product\AnswerReviewEditForm */
/* @var $review shop\entities\shop\product\Review*/

$this->title = 'Изменить ответ';
$this->params['breadcrumbs'][] = ['label' => 'Назад', 'url' => [Url::to(['view', 'id' => $review->id])]];
$this->params['breadcrumbs'][] = $this->title;

 ?>
<div class="characteristic-update">

    <?= $this->render('_form', [
        'answerReviewEditForm' => $answerReviewEditForm,
    ]) ?>

</div>
