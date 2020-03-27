<?php

namespace backend\controllers\other;


use shop\entities\other\AboutUs;
use shop\forms\manage\other\AboutUsForm;
use shop\useCases\manage\other\AboutUsManageService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class AboutUsController extends Controller
{
    private $service;


    public function __construct(
        $id,
        $module,
        AboutUsManageService $service,
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
            'query' => AboutUs::find(),
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
        $aboutUs = $this->findModel($id);


        return $this->render('view', [
            'aboutUs' => $aboutUs,
        ]);
    }



    public function actionUpdate($id)
    {
        $aboutUs = $this->findModel($id);

        $form = new AboutUsForm($aboutUs);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($aboutUs->id, $form);
                return $this->redirect(['view', 'id' => $aboutUs->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
            'aboutUs' => $aboutUs,
        ]);
    }



    /**
     * @param integer $id
     * @return AboutUs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): AboutUs
    {
        if (($model = AboutUs::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
