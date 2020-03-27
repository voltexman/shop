<?php
namespace frontend\controllers;


use shop\forms\shop\search\SearchForm;
use yii\web\Controller;
use Yii;
use yii\base\Event;
use yii\web\View;


class AppController extends Controller
{

    public function beforeAction($action)
    {
        Event::on(View::class, View::EVENT_BEFORE_RENDER, function() {

            Yii::$app->view->params['searchForm'] = new SearchForm();
        });
        return parent::beforeAction($action);
    }

}