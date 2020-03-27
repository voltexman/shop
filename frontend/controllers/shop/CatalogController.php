<?php

namespace frontend\controllers\shop;

use frontend\controllers\AppController;
use shop\entities\shop\product\Review;
use shop\forms\shop\AddToCartForm;
use shop\forms\shop\AnswerReviewForm;
use shop\forms\shop\ReviewForm;
use shop\forms\shop\search\CatalogForm;
use shop\forms\shop\search\SearchForm;
use shop\readModels\shop\ProductReadRepository;
use shop\useCases\manage\shop\ProductManageService;
use shop\useCases\shop\ProductService;
use Yii;

use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;

class CatalogController extends AppController
{

    private $products;
    private $productManageService;
    private $productService;

    public function __construct(
        $id,
        $module,
        ProductReadRepository $products,
        ProductManageService $productManageService,
        ProductService $productService,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->products = $products;
        $this->productManageService = $productManageService;
        $this->productService = $productService;
    }




    /**
     * @return mixed
     */
    public function actionCatalog()
    {
        $category = Yii::$app->request->get('category') ?: null;
        $maxPrice = $this->products->getMaxPrice();

        $form = new CatalogForm($maxPrice);
        $form->category = (int)$category;
        $form->load(\Yii::$app->request->queryParams);
        $form->validate();

        $dataProvider = $this->products->filter($form);


        return $this->render('catalog', [
            'dataProvider' => $dataProvider,
            'catalogForm' => $form,
        ]);
    }



    /**
     * @return mixed
     */
    public function actionSearch()
    {
        $form = new SearchForm();
        $form->load(\Yii::$app->request->queryParams);
        $form->validate();

        $dataProvider = $this->products->search($form);


        return $this->render('search', [
            'dataProvider' => $dataProvider,
            'searchForm' => $form,
        ]);
    }




    /**
     * @param $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionProduct($id)
    {
        if (!$product = $this->products->find($id)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $this->productService->addViewedProduct($id);
        $reviews = $this->products->getReviewByProduct($product->id, 5);
//        $addToCartForm = new AddToCartForm($product);


        $reviewForm = new ReviewForm();
        $answerReviewForm = new AnswerReviewForm();

        if (!Yii::$app->user->isGuest){
            $reviewForm->userId = Yii::$app->user->identity->getId();
            $answerReviewForm->userId = Yii::$app->user->identity->getId();
        }

        if ($reviewForm->load(Yii::$app->request->post()) && $reviewForm->validate()) {
            try {
                $this->productService->addReview($product->id, $reviewForm);
                Yii::$app->session->setFlash('success', 'Ваш комментарий успешно создан');
                return $this->redirect(['product', 'id' => $product->id, '#' => 'reviews-wrap-all']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        if ($answerReviewForm->load(Yii::$app->request->post()) && $answerReviewForm->validate()) {
            try {
                $this->productService->addAnswerReview($answerReviewForm);
                Yii::$app->session->setFlash('success', 'Ваш комментарий успешно создан');
                return $this->redirect(['product', 'id' => $product->id, '#' => 'reviews-wrap-all']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }


        return $this->render('product', [
            'product' => $product,
//            'addToCartForm' => $addToCartForm,
            'reviewForm' => $reviewForm,
            'answerReviewForm' => $answerReviewForm,
            'reviews' => $reviews,
        ]);
    }



    /**
     * @param $product
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionReviews($product)
    {
        if (!$product = $this->products->find($product)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

//        $addToCartForm = new AddToCartForm($product);

        $dataProvider = new ActiveDataProvider([
            'query' => Review::find()->where(['product_id' => $product->id])->andWhere(['active' => true])->orderBy(['id' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 6,
            ],
        ]);


        $reviewForm = new ReviewForm();
        $answerReviewForm = new AnswerReviewForm();

        if (!Yii::$app->user->isGuest){
            $reviewForm->userId = Yii::$app->user->identity->getId();
            $answerReviewForm->userId = Yii::$app->user->identity->getId();
        }

        if ($reviewForm->load(Yii::$app->request->post()) && $reviewForm->validate()) {
            try {
                $this->productService->addReview($product->id, $reviewForm);
                Yii::$app->session->setFlash('success', 'Ваш комментарий успешно создан');
                return $this->redirect(['reviews', 'product' => $product->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        if ($answerReviewForm->load(Yii::$app->request->post()) && $answerReviewForm->validate()) {
            try {
                $this->productService->addAnswerReview($answerReviewForm);
                Yii::$app->session->setFlash('success', 'Ваш комментарий успешно создан');
                return $this->redirect(['reviews', 'product' => $product->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }


        return $this->render('reviews', [
            'product' => $product,
//            'addToCartForm' => $addToCartForm,
            'reviewForm' => $reviewForm,
            'answerReviewForm' => $answerReviewForm,
            'dataProvider' => $dataProvider,
        ]);
    }

}