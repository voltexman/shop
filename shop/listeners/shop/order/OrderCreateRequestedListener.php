<?php

namespace shop\listeners\shop\order;

use shop\entities\shop\order\events\OrderCreateRequested;
use Yii;
use yii\mail\MailerInterface;

class OrderCreateRequestedListener
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(OrderCreateRequested $event): void
    {
        $sent = $this
            ->mailer
            ->compose(
                ['html' => 'shop/order/create-html', 'text' => 'shop/order/create-text'],
                ['order' => $event->order]
            )
            ->setTo(Yii::$app->params['adminEmail'])
            ->setSubject('Заказ с магазина EcoLook.com')
            ->send();
        if (!$sent){
            throw new \RuntimeException('Email sending error.');
        }
    }
}