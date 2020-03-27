<?php

use shop\entities\other\contacts\Address;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Адрес';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'label' => 'Адрес',
                        'attribute' => 'text',
                        'value' => function (Address $model) {
                            return Html::a(Html::encode($model->text), ['update', 'id' => $model->id]);
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
