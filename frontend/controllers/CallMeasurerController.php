<?php
namespace frontend\controllers;


use shop\forms\shop\CallMeasurerForm;
use shop\useCases\shop\CallMeasurerService;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Response;

class CallMeasurerController extends AppController {


    private $service;

    public function __construct(
        $id,
        $module,
        CallMeasurerService $service,
        $config = []
    )
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
                    'create' => ['POST'],
                ],
            ],
        ];
    }


    public function actionCreate(){

        $form = new CallMeasurerForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $order = $this->service->create($form);
                Yii::$app->session->setFlash('success', 'Заявка отправлена');
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->redirect(Yii::$app->request->referrer ?: $this->goHome());

//        if (Yii::$app->request->isAjax && $form->load(Yii::$app->request->post())){
//            Yii::$app->response->format = Response::FORMAT_JSON;
//            if (!$form->validate()){
//                return $this->asJson(['error' => ArrayHelper::getValue(ActiveForm::validate($form), 'callmeasurerform-phone')]);
//            } else {
//                try {
//                    $order = $this->service->create($form);
//                    return $this->asJson(['success' => true]);
//                } catch (\DomainException $e) {
//                    Yii::$app->errorHandler->logException($e);
//                    Yii::$app->session->setFlash('error', $e->getMessage());
//                }
//                return $this->asJson(['success' => false]);
//            }
//
//        }
    }

}
