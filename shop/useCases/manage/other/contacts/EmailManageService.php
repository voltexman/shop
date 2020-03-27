<?php

namespace shop\useCases\manage\other\contacts;


use shop\entities\other\contacts\Email;
use shop\forms\manage\other\contacts\EmailForm;
use shop\repositories\other\contacts\EmailRepository;

class EmailManageService
{
    private $repository;


    public function __construct(EmailRepository $repository)
    {
        $this->repository = $repository;
    }


    public function edit($id, EmailForm $form): Email
    {
        $email = $this->repository->get($id);
        $email->edit($form->emailText);
        $this->repository->save($email);
        return $email;
    }

}