<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $phone shop\entities\other\contacts\Phone */

$this->title = $phone->text;
$this->params['breadcrumbs'][] = ['label' => 'Телефоны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $phone->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $phone->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы подтверждаете данное действия?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $phone,
                'attributes' => [
                    [
                        'label' => 'Телефон',
                        'attribute' => 'text',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
