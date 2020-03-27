<?php

use shop\entities\other\contacts\Email;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Почта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">


    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'label' => 'Почта',
                        'attribute' => 'text',
                        'value' => function (Email $model) {
                            return Html::a(Html::encode($model->email), ['update', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [   'header' => 'Действия',
                        'class' => ActionColumn::class,
                        'template' => '{update}'
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
