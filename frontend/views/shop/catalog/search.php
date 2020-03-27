<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $searchForm shop\forms\shop\search\SearchForm */

$this->title = 'Поиск по запросу: ' . $searchForm->text;
$this->params['breadcrumbs'][] = $this->title;

?>


<section class="s-catalog">
    <div class="container">
        <div class="custom_row">
            <div class="column filter">
            </div>


            <?= $this->render('_list', [
                'dataProvider' => $dataProvider
            ]) ?>


        </div>
    </div>
</section>




