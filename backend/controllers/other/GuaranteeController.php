<?php

namespace backend\controllers\other;


use shop\entities\other\Guarantee;
use shop\forms\manage\other\GuaranteeForm;
use shop\useCases\manage\other\GuaranteeManageService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class GuaranteeController extends Controller
{
    private $service;


    public function __construct(
        $id,
        $module,
        GuaranteeManageService $service,
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
            'query' => Guarantee::find(),
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
        $guarantee = $this->findModel($id);

        return $this->render('view', [
            'guarantee' => $guarantee,
        ]);
    }



    public function actionUpdate($id)
    {
        $guarantee = $this->findModel($id);

        $form = new GuaranteeForm($guarantee);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($guarantee->id, $form);
                return $this->redirect(['view', 'id' => $guarantee->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
            'guarantee' => $guarantee,
        ]);
    }



    /**
     * @param integer $id
     * @return Guarantee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): Guarantee
    {
        if (($model = Guarantee::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
