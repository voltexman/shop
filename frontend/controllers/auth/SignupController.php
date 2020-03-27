<?php
namespace frontend\controllers\auth;

use frontend\controllers\AppController;
use shop\forms\auth\SignupForm;
use shop\useCases\auth\SignupService;
use Yii;
use yii\base\Module;

class SignupController extends AppController
{

    private $signupService;

    public function __construct(string $id, Module $module, SignupService $signupService,array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->signupService = $signupService;
    }



    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $form = new SignupForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->signupService->signup($form);
                Yii::$app->session->setFlash('success', 'Проверте свою почту и перейдите по ссылке чтобы подтвердить Ваш email');
                return $this->redirect(['/login']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('index', [
            'model' => $form,
        ]);
    }


    public function actionConfirm($token){
        try {
            $this->signupService->confirm($token);
            Yii::$app->session->setFlash('success', 'Ваш email успешно подтвержден');
            return $this->redirect(['/login']);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->goHome();
        }
    }

}