<?php

namespace frontend\controllers;


use shop\readModels\other\OurServiceReadRepository;

class OurServiceController extends AppController {

    private $repository;

    public function __construct(
        $id,
        $module,
        OurServiceReadRepository $repository,
        $config = []
    )
    {
        $this->repository = $repository;
        parent::__construct($id, $module, $config);
    }



    public function actionIndex(){

        $ourService = $this->repository->getOurService();

        return $this->render('index',[
            'ourService' => $ourService,
        ]);
    }

}
