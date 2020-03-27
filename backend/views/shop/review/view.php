<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $review shop\entities\shop\product\Review */

$this->title = 'Отзыв к товару: ' . $review->product->name;
$this->params['breadcrumbs'][] = ['label' => 'Отзывы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $review->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $review->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $review,
                'attributes' => [
                    [
                        'label' => 'Дата создания',
                        'attribute' => 'created_at',
                        'format' => 'datetime'
                    ],
                    [
                        'label' => 'Имя пользователя',
                        'value' => $review->user->getUsername(),
                    ],
                    [
                        'label' => 'Товар',
                        'attribute' => 'product.name',
                    ],
                    [
                        'label' => 'Оценка',
                        'attribute' => 'vote',
                    ],
                    [
                        'label' => 'Текст отзыва',
                        'attribute' => 'text',
                        'format' => 'ntext'
                    ],
                ],
            ]) ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h4>Ответы на отзывы и комментарии</h4>

                </div>
                <div class="box-body">
                    <p>
                        <?= Html::a('Добавить ответ', [Url::to(['create-answer', 'id' => $review->id])], ['class' => 'btn btn-success']) ?>
                    </p>
                    <?= $this->render('../review/answer/index', [
                        'dataProvider' => $dataProvider,
                        'review' => $review,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>


</div>
