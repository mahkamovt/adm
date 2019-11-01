<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

$this->title = Yii::t('rbac-admin', 'Регистрация');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container adm">
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p></p>
    <?= Html::errorSummary($model)?>
    <div class="row">
        <div class="col-sm-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'lastname') ?>
                <?= $form->field($model, 'mobphone')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '+7 (999)-999-99-99',
]) ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'retypePassword')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('rbac-admin', 'Зарегистрироваться на ADM'), ['class' => 'btn btn-login', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-sm-7">
            <div class="img-adm-login">
<img src="/images/user/adm-signup.jpg" alt="">
            </div>
        </div>
    </div>
</div>
</div>