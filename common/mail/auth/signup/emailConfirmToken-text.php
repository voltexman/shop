<?php

/* @var $this yii\web\View */
/* @var $user shop\entities\user\User */

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['/confirm', 'token' => $user->email_confirm_token]);

?>
Привет <?= $user->getUsername() ?>,

Перейдите пожалуйста по ссылке чтобы подтвердить ваш email:

<?= $confirmLink ?>
