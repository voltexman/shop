<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $paymentKeys shop\entities\payment\PaymentKeys */



$this->title = 'Просмотр ключей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Изменить', ['update'], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">Общие</div>
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $paymentKeys,
                        'attributes' => [
                            [
                                'label' => 'Приватный ключ (private_key)',
                                'attribute' => 'private_key',
                            ],
                            [
                                'label' => 'Публичный ключ (public_key)',
                                'attribute' => 'public_key',
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

    </div>

</div>
