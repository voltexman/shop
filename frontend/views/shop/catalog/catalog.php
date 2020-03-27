<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $catalogForm shop\forms\shop\search\CatalogForm */

use shop\helpers\CategoryHelper;
use shop\helpers\ProductHelper;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Поиск товаров';


$category = null;
if ($catalogForm->category){
    $category = $catalogForm->getCategoryById($catalogForm->category);
    foreach ($category->parents as $parent) {
        if (!$parent->isRoot()) {
            $this->params['breadcrumbs'][] = ['label' => $parent->name, 'url' => ['shop/catalog/catalog', 'category' => $parent->id]];
        }
    }
    $this->params['breadcrumbs'][] = $category->name;
} else {
    $this->params['breadcrumbs'][] = 'Поиск товаров';
}


?>


<section class="s-catalog">
    <div class="container">
        <div class="custom_row">
            <div class="column filter">
                <div class="filter_wrapper">
                    <?php $form = ActiveForm::begin(['action' => [''], 'method' => 'get', 'id' => 'searchForm'], ['options' => ['data-pjax' => true]]) ?>
                        <?= $form->field($catalogForm, 'category')->hiddenInput()->label(false); ?>
                        <div class="mobile_close_filter">
                            <button class="m_filter_close">
                                <span class="filter_clsoe_icon icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="8" viewBox="0 0 15 8"><g><g><path fill="#313131" d="M.198.155a.528.528 0 0 1 .747 0l6.57 6.583L14.098.155a.528.528 0 1 1 .747.747L7.902 7.845A.515.515 0 0 1 7.528 8a.538.538 0 0 1-.373-.155L.21.902A.518.518 0 0 1 .198.155z"></path></g></g></svg>
                                </span>
                                <?= $category ? Html::encode($category->name) : '' ?>
                            </button>
                        </div>
                        <div class="filter_wrapper-item">
                            <div class="filter_wrapper-item-button">
                                Категории
                                <span class="filter_icon icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="8" viewBox="0 0 15 8"><g><g><path fill="#313131" d="M.198.155a.528.528 0 0 1 .747 0l6.57 6.583L14.098.155a.528.528 0 1 1 .747.747L7.902 7.845A.515.515 0 0 1 7.528 8a.538.538 0 0 1-.373-.155L.21.902A.518.518 0 0 1 .198.155z"/></g></g></svg>
                                </span>
                            </div>
                            <div class="filter_wrapper-item-body">
                                <?= CategoryHelper::showCategoriesForSearch($category); ?>
                                <span class="see__more">Еще</span>
                            </div>
                        </div>


                        <div class="filter_wrapper-item">
                            <div class="filter_wrapper-item-button">
                                Бренды
                                <span class="filter_icon icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="8" viewBox="0 0 15 8"><g><g><path fill="#313131" d="M.198.155a.528.528 0 0 1 .747 0l6.57 6.583L14.098.155a.528.528 0 1 1 .747.747L7.902 7.845A.515.515 0 0 1 7.528 8a.538.538 0 0 1-.373-.155L.21.902A.518.518 0 0 1 .198.155z"/></g></g></svg>
                                </span>
                            </div>
                            <div class="filter_wrapper-item-body">
                                <ul>
                                    <?php foreach ($catalogForm->brandsList() as $key => $value): ?>
                                        <li>
                                            <label class="checkbox">
                                                <input id="label_<?=$key?>" name="brands[]" type="checkbox"  value="<?= Html::encode($key); ?>" <?php if (!empty($catalogForm->brands)){
                                                    foreach ($catalogForm->brands as $key_1 => $value_1){
                                                        if (rtrim($value_1) == rtrim($key)){
                                                            echo ' checked';
                                                        }
                                                    }
                                                } ?> hidden><div class="checkbox__text"> <?= Html::encode($value); ?> </div>
                                            </label>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <span class="see__more">Еще</span>
                            </div>
                        </div>

                        <div class="filter_wrapper-item">
                            <div class="filter_wrapper-item-button">
                                Цена
                                <span class="filter_icon icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="8" viewBox="0 0 15 8"><g><g><path fill="#313131" d="M.198.155a.528.528 0 0 1 .747 0l6.57 6.583L14.098.155a.528.528 0 1 1 .747.747L7.902 7.845A.515.515 0 0 1 7.528 8a.538.538 0 0 1-.373-.155L.21.902A.518.518 0 0 1 .198.155z"/></g></g></svg>
                                </span>
                            </div>
                            <div class="filter_wrapper-item-body">
                                <div class="filter-column-item-slider">
                                    <div id="inputRange" class="form-group onchange">
                                        <input type="text" step="1" name="from" value="<?= $catalogForm->from ?: null ?>" id="min_price" class="input-p" >
                                        <span class="separator"></span>
                                        <input type="text" step="1" name="to" value="<?= $catalogForm->to ?: null ?>" id="max_price" class="input-p" >
                                        <span class="nouslider_carency">
                                            грн.
                                        </span>
                                    </div>
                                    <input type="hidden" id="max_available_price" value="<?= $catalogForm->getMaxPrice(); ?>">
                                    <div id="html5"></div>
                                    <input type="hidden" id="price-form-hidden" value="0">
                                    <input type="hidden" id="price-to-hidden" value="0">
                                </div>
                            </div>
                        </div>



                        <?php $k = 0; ?>
                        <?php foreach ($catalogForm->values as $i => $value): ?>
                            <div class="filter_wrapper-item">
                                <div class="filter_wrapper-item-button">
                                    <?= Html::encode($value->getCharacteristicName())?>
                                    <span class="filter_icon icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="8" viewBox="0 0 15 8"><g><g><path fill="#313131" d="M.198.155a.528.528 0 0 1 .747 0l6.57 6.583L14.098.155a.528.528 0 1 1 .747.747L7.902 7.845A.515.515 0 0 1 7.528 8a.538.538 0 0 1-.373-.155L.21.902A.518.518 0 0 1 .198.155z"/></g></g></svg>
                                    </span>
                                </div>
                                <div class="filter_wrapper-item-body">
                                    <ul>
                                        <?php if ($variants = $value->variantsList()): ?>

                                            <?php $j = 0;?>
                                            <?php foreach ($variants as $key => $variant): ?>
                                                <li>
                                                    <label class="checkbox">
                                                        <input id="attr_<?=$k?>" type="checkbox" name="v[<?=$i?>][equal][]" <?php if (isset($catalogForm->values[$i]['equal'])){
                                                            foreach ($catalogForm->values[$i]['equal'] as $id => $val){
                                                                if (rtrim($val) == rtrim($variant)){
                                                                    echo ' checked';
                                                                }
                                                            }
                                                        } ?>  value="<?= Html::encode($variant); ?>"><div class="checkbox__text"> <?= Html::encode($variant); ?> </div>
                                                    </label>
                                                </li>
                                                <?php $j++; ?>
                                                <?php $k++; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                        <div class="filter_wrapper-item">
                            <div class="filter_wrapper-item-button">
                                Товар
                                <span class="filter_icon icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="8" viewBox="0 0 15 8"><g><g><path fill="#313131" d="M.198.155a.528.528 0 0 1 .747 0l6.57 6.583L14.098.155a.528.528 0 1 1 .747.747L7.902 7.845A.515.515 0 0 1 7.528 8a.538.538 0 0 1-.373-.155L.21.902A.518.518 0 0 1 .198.155z"/></g></g></svg>
                                    </span>
                            </div>
                            <div class="filter_wrapper-item-body">
                                <ul>
                                    <?php foreach (ProductHelper::labelListForSearch() as $key => $value): ?>
                                        <li>
                                            <label class="checkbox">
                                                <input id="label_<?=$key?>" name="label[]" type="checkbox"  value="<?= Html::encode($key); ?>" <?php if (!empty($catalogForm->label)){
                                                    foreach ($catalogForm->label as $key_1 => $value_1){
                                                        if (rtrim($value_1) == rtrim($key)){
                                                            echo ' checked';
                                                        }
                                                    }
                                                } ?> hidden><div class="checkbox__text"> <?= Html::encode($value); ?> </div>
                                            </label>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="mobile_filter_button">
                            <a href="<?= Url::to(['']) ?>" class="m_delete_all">Очистить</a>
                            <button type="submit" class="m_fillter_veiwe_all">Показать</button>
                        </div>

                        <button type="submit" class="m_fillter_veiwe_all">Показать</button>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>


            <?= $this->render('_list', [
                'dataProvider' => $dataProvider
            ]) ?>


        </div>
    </div>
</section>




