<?php

/* @var $this yii\web\View */
/* @var $category shop\entities\shop\Category */
/* @var $model shop\forms\manage\shop\CategoryForm */

$this->title = 'Изменить категорию: ' . $category->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $category->name, 'url' => ['view', 'id' => $category->id]];
?>
<div class="category-update">

    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category,
    ]) ?>

</div>
