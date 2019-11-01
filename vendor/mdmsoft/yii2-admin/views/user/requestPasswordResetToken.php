<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\PasswordResetRequest */

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container adm">
<div class="site-request-password-reset">
    <h1>Сменить пароль</h1>

    <p>Введите email, который Вы использовали при регистрации,</br> Мы вышлем на него ссылку для смены пароля.</p>

    <div class="row">
        <div class="col-sm-5">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                <?= $form->field($model, 'email') ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('rbac-admin', 'Отправить'), ['class' => 'btn btn-login']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-sm-7">
            <div class="img-adm-login">
<img src="/images/user/adm-login-2.jpg" alt="">
            </div>
        </div>
    </div>
</div>
</div>