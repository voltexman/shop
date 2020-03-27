<?php

use shop\entities\other\contacts\Soc;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Соц. сети';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'label' => 'Название',
                        'attribute' => 'name',
                        'value' => function (Soc $model) {
                            return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [   'header' => 'Действия',
                        'class' => ActionColumn::class,
                        'template' => '{view}{update}'
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
