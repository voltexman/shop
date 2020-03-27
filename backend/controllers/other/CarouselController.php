<?php

namespace backend\controllers\other;



use shop\entities\other\carousel\Carousel;
use shop\forms\manage\other\carousel\CarouselForm;
use shop\useCases\manage\other\CarouselManageService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class CarouselController extends Controller
{
    private $service;


    public function __construct(
        $id,
        $module,
        CarouselManageService $service,
        $config = [])
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
                    'delete-photo' => ['POST'],
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
            'query' => Carousel::find(),
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
        $carouselItem = $this->findModel($id);

        return $this->render('view', [
            'carouselItem' => $carouselItem,
        ]);
    }

    /**
     * @return mixed
     */
    public function actionCreate()
    {
        $form = new CarouselForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $carouselItem = $this->service->create($form);
                return $this->redirect(['view', 'id' => $carouselItem->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('create', [
            'model' => $form,
        ]);
    }




    public function actionUpdate($id)
    {
        $carouselItem = $this->findModel($id);

        $form = new CarouselForm($carouselItem);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($carouselItem->id, $form);
                return $this->redirect(['view', 'id' => $carouselItem->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
            'carouselItem' => $carouselItem,
        ]);
    }


    /**
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        try {
            $this->service->remove($id);
        } catch (\DomainException $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }



    /**
     * @param integer $id
     * @return mixed
     */
    public function actionDeletePhoto($id)
    {
        try {
            $this->service->removePhoto((int)$id);
        } catch (\DomainException $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['update', 'id' => $id,]);
    }




    /**
     * @param integer $id
     * @return Carousel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): Carousel
    {
        if (($model = Carousel::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
