<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $answerReviewEditForm shop\forms\manage\shop\product\AnswerReviewEditForm */
/* @var $review shop\entities\shop\product\Review*/

$this->title = 'Добавить ответ';
$this->params['breadcrumbs'][] = ['label' => 'Назад', 'url' => [Url::to(['view', 'id' => $review->id])]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="characteristic-create">

    <?= $this->render('_form', [
        'answerReviewEditForm' => $answerReviewEditForm,
    ]) ?>

</div>
