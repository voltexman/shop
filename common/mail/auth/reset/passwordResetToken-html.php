<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user \shop\entities\user\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['/reset', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Привет <?= Html::encode($user->username) ?>,</p>

    <p>Перейдите пожалуйста по ссылке чтобы изменить пароль:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
