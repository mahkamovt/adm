<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="container adm">
<div class="row">
        <div class="col-sm-5">
    <div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'mobphone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>




    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-login']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>      </div>
         <div class="col-sm-7">
            <div class="img-adm-login">
<img src="/images/user/adm-login-2.jpg" alt="">
            </div>
        </div>
    </div>
</div>

