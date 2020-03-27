<?php

namespace frontend\controllers\shop;

use frontend\controllers\AppController;
use shop\cart\Cart;
use shop\forms\shop\order\OrderForm;
use shop\useCases\shop\OrderService;
use Yii;

class CheckoutController extends AppController
{

    private $service;
    private $cart;

    public function __construct($id, $module, OrderService $service, Cart $cart, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
        $this->cart = $cart;
    }


    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $form = new OrderForm();

        if (empty($this->cart->getItems())){
            return $this->redirect(['/search']);
        }

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $order = $this->service->checkout($form);
                Yii::$app->session->setFlash('success', 'Вы успешно оформили заказ');
                return $this->redirect(['/search']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('index', [
            'cart' => $this->cart,
            'model' => $form,
        ]);
    }
}