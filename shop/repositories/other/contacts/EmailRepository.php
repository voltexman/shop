<?php

namespace shop\repositories\other\contacts;

use shop\entities\other\contacts\Email;
use shop\repositories\NotFoundException;

class EmailRepository
{
    public function get($id): Email
    {
        if (!$email = Email::findOne($id)) {
            throw new NotFoundException('Email is not found.');
        }
        return $email;
    }

    public function save(Email $email): void
    {
        if (!$email->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Email $email): void
    {
        if (!$email->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }

}