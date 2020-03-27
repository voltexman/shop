<?php

namespace backend\controllers\payment;


use shop\entities\payment\PaymentKeys;
use shop\forms\manage\payment\PaymentKeysForm;
use shop\useCases\manage\payment\PaymentSettingManageService;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PaymentKeysController extends Controller
{
    private $service;

    public function __construct($id, $module, PaymentSettingManageService $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }



    public function actionView()
    {
        return $this->render('view', [
            'paymentKeys' => $this->findModel(1),
        ]);
    }





    public function actionUpdate()
    {
        $paymentKeys = $this->findModel(1);

        $form = new PaymentKeysForm($paymentKeys);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->editKeys($form);
                return $this->redirect(['view']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
        ]);
    }




    /**
     * @param integer $id
     * @return PaymentKeys the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): PaymentKeys
    {
        if (($model = PaymentKeys::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
