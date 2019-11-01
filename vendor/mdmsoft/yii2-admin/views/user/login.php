<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Login */

$this->title = Yii::t('rbac-admin', 'ADM | Войти');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container adm">
<div class="site-login">
     <div class="col-sm-12">
      <div class="advertisement mob-img-user">

            <img src="/images/shop/adm-banner2.jpg" alt="">

    </div>
</div>
    <h1>Войти используя логин и пароль</h1>
    <p></p>
    <div class="row">
        <div class="col-sm-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div style="color:#999;margin:1em 0">
                   <p> Если вы забыли пароль, то вы можете <?= Html::a('сменить его', ['user/request-password-reset']) ?>.</p>
                    <p>Если вы новый пользователь, то можете <?= Html::a('зарегистрироваться', ['user/signup']) ?>.</p>
                </div>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('rbac-admin', 'Войти'), ['class' => 'btn btn-login', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
         <div class="col-sm-7">
            <div class="img-adm-login">
<img src="/images/user/adm-login.jpg" alt="">
            </div>
        </div>
    </div>
</div>
</div>