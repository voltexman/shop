<?php
namespace backend\controllers\auth;

use shop\forms\auth\LoginForm;
use shop\useCases\auth\AuthService;
use yii\base\Module;
use yii\web\Controller;
use Yii;



class AuthController  extends Controller
{
    private $authService;
    public $layout = 'main-login';

    public function __construct(string $id, Module $module, AuthService $authService, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->authService = $authService;
    }


    public function actionLogin(){

        $form = new LoginForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $user = $this->authService->auth($form);
                Yii::$app->user->login($user,$form->rememberMe ? 3600 * 24 * 30 : 0);
                return $this->goBack();
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('login', [
            'model' => $form,
        ]);
    }



    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
    }

}