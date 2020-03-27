<?php
namespace frontend\controllers;


use shop\readModels\other\ContactReadRepository;
use Yii;
use yii\helpers\VarDumper;

class SiteController extends AppController {


    private $repository;

    public function __construct(
        $id,
        $module,
        ContactReadRepository $repository,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->repository = $repository;
    }


    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbout()
    {
        return $this->render('about',[
            'aboutUs' => $this->repository->getAboutUs()
        ]);
    }

}
