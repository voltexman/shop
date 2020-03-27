<?php

/* @var $this yii\web\View */
/* @var $user \shop\entities\user\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['/reset', 'token' => $user->password_reset_token]);
?>
Привет <?= $user->username ?>,

Перейдите пожалуйста по ссылке чтобы изменить пароль:

<?= $resetLink ?>
