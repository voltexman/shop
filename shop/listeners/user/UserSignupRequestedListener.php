<?php

namespace shop\listeners\user;

use shop\entities\user\events\UserSignUpRequested;
use Yii;
use yii\mail\MailerInterface;

class UserSignupRequestedListener
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(UserSignUpRequested $event): void
    {
        $sent = $this
            ->mailer
            ->compose(
                ['html' => 'auth/signup/emailConfirmToken-html', 'text' => 'auth/signup/emailConfirmToken-text'],
                ['user' => $event->user]
            )
            ->setTo($event->user->email)
            ->setSubject('Подтверждения регистрации для ' . Yii::$app->params['projectName'])
            ->send();
        if (!$sent){
            throw new \RuntimeException('Email sending error.');
        }
    }
}