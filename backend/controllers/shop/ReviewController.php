<?php

namespace backend\controllers\shop;

use backend\forms\shop\ReviewSearch;
use shop\entities\shop\product\AnswerReview;
use shop\entities\shop\product\Review;
use shop\forms\manage\shop\product\ReviewEditForm;
use shop\forms\manage\shop\product\AnswerReviewEditForm;
use shop\useCases\manage\shop\ReviewManageService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ReviewController extends Controller
{
    private $service;

    public function __construct($id, $module, ReviewManageService $service, $config = [])
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

        $searchModel = new ReviewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCreateAnswer($id)
    {
        $review = $this->findModel($id);

        $answerReviewForm = new AnswerReviewEditForm();
        if ($answerReviewForm->load(Yii::$app->request->post()) && $answerReviewForm->validate()) {
            try {
                $this->service->addAnswer($review->id, Yii::$app->user->getId(), $answerReviewForm);
                return $this->redirect(['view', 'id' => $review->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('../review/answer/create', [
            'answerReviewEditForm' => $answerReviewForm,
            'review' => $review,
        ]);
    }



    public function actionUpdateAnswer($id, $answer_id)
    {
        $review = $this->findModel($id);
        $answerReview = AnswerReview::findOne($answer_id);

        if (!$answerReview){
            throw new NotFoundHttpException('The requested page does not exist.');
        }


        $answerReviewForm = new AnswerReviewEditForm($answerReview);
        if ($answerReviewForm->load(Yii::$app->request->post()) && $answerReviewForm->validate()) {
            try {
                $this->service->editAnswer($review->id,$answerReview->id, $answerReviewForm);
                return $this->redirect(['view', 'id' => $review->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('../review/answer/update', [
            'answerReviewEditForm' => $answerReviewForm,
            'review' => $review,
        ]);

    }



    public function actionDeleteAnswer($id, $answer_id)
    {
        $review = $this->findModel($id);
        $answerReview = AnswerReview::findOne($answer_id);

        if (!$answerReview){
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        try {
            $this->service->removeAnswer($review->id, $answerReview->id);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        return $this->redirect(['view', 'id' => $review->id]);
    }





    public function actionView($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AnswerReview::find()->where(['review_id' => (int)$id]),
            'sort'=> [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);


        return $this->render('view', [
            'review' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionUpdate($id)
    {
        $review = $this->findModel($id);

        $form = new ReviewEditForm($review);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($review->id, $form);
                return $this->redirect(['view', 'id' => $review->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
            'review' => $review,
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
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }


    /**
     * @param integer $id
     * @return Review the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): Review
    {
        if (($model = Review::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
