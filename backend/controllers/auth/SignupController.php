<?php
namespace backend\controllers\auth;

use shop\forms\auth\SignupForm;
use shop\useCases\auth\SignupService;
use Yii;
use yii\base\Module;
use yii\web\Controller;

class SignupController extends Controller
{

    private $signupService;
    public $layout = 'main-login';

    public function __construct(string $id, Module $module, SignupService $signupService,array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->signupService = $signupService;
    }



    public function actionSignup()
    {
        $form = new SignupForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->signupService->signup($form);
                Yii::$app->session->setFlash('success', 'Проверте Вашу почту и пройдите по ссылке в письме чтобы подтвердить email');
                return $this->goHome();
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('signup', [
            'model' => $form,
        ]);
    }


    public function actionConfirm($token){
        try {
            $this->signupService->confirm($token);
            Yii::$app->session->setFlash('success', 'Ваш email подтвержден');
            return $this->redirect(['/login']);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->goHome();
        }
    }

}