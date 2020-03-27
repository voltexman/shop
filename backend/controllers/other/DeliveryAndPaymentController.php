<?php

namespace backend\controllers\other;


use shop\entities\other\DeliveryAndPayment;
use shop\forms\manage\other\DeliveryAndPaymentForm;
use shop\useCases\manage\other\DeliveryAndPaymentManageService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DeliveryAndPaymentController extends Controller
{
    private $service;


    public function __construct(
        $id,
        $module,
        DeliveryAndPaymentManageService $service,
        $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }


    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => DeliveryAndPayment::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $deliveryAndPayment = $this->findModel($id);

        return $this->render('view', [
            'deliveryAndPayment' => $deliveryAndPayment,
        ]);
    }



    public function actionUpdate($id)
    {
        $deliveryAndPayment = $this->findModel($id);

        $form = new DeliveryAndPaymentForm($deliveryAndPayment);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($deliveryAndPayment->id, $form);
                return $this->redirect(['view', 'id' => $deliveryAndPayment->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
            'deliveryAndPayment' => $deliveryAndPayment,
        ]);
    }



    /**
     * @param integer $id
     * @return DeliveryAndPayment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): DeliveryAndPayment
    {
        if (($model = DeliveryAndPayment::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
