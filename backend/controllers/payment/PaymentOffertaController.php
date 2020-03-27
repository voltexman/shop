<?php

namespace backend\controllers\payment;




use shop\entities\payment\PaymentOfferta;
use shop\forms\manage\payment\PaymentOffertaForm;
use shop\useCases\manage\payment\PaymentSettingManageService;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PaymentOffertaController extends Controller
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
            'paymentOfferta' => $this->findModel(1),
        ]);
    }





    public function actionUpdate()
    {
        $paymentOfferta = $this->findModel(1);

        $form = new PaymentOffertaForm($paymentOfferta);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->editOfferta($form);
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
     * @return PaymentOfferta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): PaymentOfferta
    {
        if (($model = PaymentOfferta::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
