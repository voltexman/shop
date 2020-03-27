<?php

namespace backend\controllers\other\contacts;


use shop\entities\other\contacts\Address;
use shop\forms\manage\other\contacts\AddressForm;
use shop\useCases\manage\other\contacts\AddressManageService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class AddressController extends Controller
{
    private $service;

    public function __construct($id, $module, AddressManageService $service, $config = [])
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
            'query' => Address::find(),
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
        return $this->render('view', [
            'address' => $this->findModel($id),
        ]);
    }




    public function actionUpdate($id)
    {
        $address = $this->findModel($id);

        $form = new AddressForm($address);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($address->id, $form);
                return $this->redirect(['index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
            'address' => $address,
        ]);
    }



    /**
     * @param integer $id
     * @return Address the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): Address
    {
        if (($model = Address::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
