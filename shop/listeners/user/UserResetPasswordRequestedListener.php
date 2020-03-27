<?php

namespace shop\listeners\user;

use shop\entities\user\events\UserResetPasswordRequested;
use Yii;
use yii\mail\MailerInterface;

class UserResetPasswordRequestedListener
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(UserResetPasswordRequested $event): void
    {
        $send = $this
            ->mailer
            ->compose(
                ['html' => 'auth/reset/passwordResetToken-html', 'text' => 'auth/reset/passwordResetToken-text'],
                ['user' => $event->user]
            )
            ->setTo($event->user->email)
            ->setSubject('Ввостаносления пароля для ' . Yii::$app->params['projectName'])
            ->send();
        if (!$send){
            throw new \RuntimeException('Sending error.');
        }
    }
}