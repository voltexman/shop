<?php
namespace backend\controllers\auth;

use shop\forms\auth\PasswordResetRequestForm;
use shop\forms\auth\ResetPasswordForm;
use shop\useCases\auth\PasswordResetService;
use yii\base\Module;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use Yii;

class ResetController extends Controller
{
    private $passwordResetService;
    public $layout = 'main-login';

    public function __construct(string $id, Module $module, PasswordResetService $passwordResetService,array $config = []){
        parent::__construct($id, $module, $config);
        $this->passwordResetService = $passwordResetService;
    }



    public function actionRequest(){
        $form = new PasswordResetRequestForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->passwordResetService->request($form);
                Yii::$app->session->setFlash('success', 'Проверте ваш email и перейдите по ссылке в письме');
                return $this->goHome();
            } catch (\RuntimeException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('request', [
            'model' => $form,
        ]);
    }




    public function actionReset($token){
        try {
            $this->passwordResetService->validateToken($token);
        } catch (\DomainException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        $form = new ResetPasswordForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->passwordResetService->reset($token, $form);
                Yii::$app->session->setFlash('success', 'Пароль успешно изменен');
                return $this->goHome();
            } catch (\DomainException $e){
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('reset', [
            'model' => $form,
        ]);
    }




}