<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $soc shop\entities\other\contacts\Soc */

$this->title = $soc->name;
$this->params['breadcrumbs'][] = ['label' => 'Соц. сети', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $soc->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $soc,
                'attributes' => [
                    [
                        'label' => 'Название',
                        'attribute' => 'name',
                    ],
                    [
                        'label' => 'Ссылка',
                        'attribute' => 'link',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
