<?php

namespace backend\controllers\payment;



use shop\entities\payment\PaymentRules;
use shop\forms\manage\payment\PaymentRulesForm;
use shop\useCases\manage\payment\PaymentSettingManageService;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PaymentRulesController extends Controller
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
            'paymentRules' => $this->findModel(1),
        ]);
    }





    public function actionUpdate()
    {
        $paymentKeys = $this->findModel(1);

        $form = new PaymentRulesForm($paymentKeys);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->editRules($form);
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
     * @return PaymentRules the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): PaymentRules
    {
        if (($model = PaymentRules::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
