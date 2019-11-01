<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Cart;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login container">
	<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<div class="form-group">
 <div>
 <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
 </div>
</div>
<?php ActiveForm::end() ?>
</div>