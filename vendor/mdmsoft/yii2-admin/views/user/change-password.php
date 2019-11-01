<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\ChangePassword */

$this->title = Yii::t('rbac-admin', 'Сменить пароль');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container adm">
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p></p>

    <div class="row">
        <div class="col-sm-5">
            <?php $form = ActiveForm::begin(['id' => 'form-change']); ?>
                <?= $form->field($model, 'oldPassword')->passwordInput() ?>
                <?= $form->field($model, 'newPassword')->passwordInput() ?>
                <?= $form->field($model, 'retypePassword')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('rbac-admin', 'Изменить'), ['class' => 'btn btn-login', 'name' => 'change-button']) ?>
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