<?php

namespace backend\controllers\other\contacts;


use shop\entities\other\contacts\Soc;
use shop\forms\manage\other\contacts\SocForm;
use shop\useCases\manage\other\contacts\SocManageService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class SocController extends Controller
{
    private $service;

    public function __construct($id, $module, SocManageService $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }



    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Soc::find(),
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
            'soc' => $this->findModel($id),
        ]);
    }





    public function actionUpdate($id)
    {
        $soc = $this->findModel($id);

        $form = new SocForm($soc);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($soc->id, $form);
                return $this->redirect(['index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
            'soc' => $soc,
        ]);
    }




    /**
     * @param integer $id
     * @return Soc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): Soc
    {
        if (($model = Soc::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
