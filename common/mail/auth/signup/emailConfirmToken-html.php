<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user shop\entities\user\User */

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['/confirm', 'token' => $user->email_confirm_token]);
?>
<div class="password-reset">
    <p>Привет <?= Html::encode($user->getUsername()) ?>,</p>

    <p>Перейдите пожалуйста по ссылке чтобы подтвердить ваш email:</p>

    <p><?= Html::a(Html::encode($confirmLink), $confirmLink) ?></p>
</div>
