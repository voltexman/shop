<?php

namespace shop\useCases\manage\other\contacts;


use shop\entities\other\contacts\Soc;
use shop\repositories\other\contacts\SocRepository;
use shop\forms\manage\other\contacts\SocForm;

class SocManageService
{
    private $repository;


    public function __construct(SocRepository $repository)
    {
        $this->repository = $repository;
    }

    public function edit($id, SocForm $form): Soc
    {
        $soc = $this->repository->get($id);
        $soc->edit($form->link);
        $this->repository->save($soc);
        return $soc;
    }


}