
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Slider;
use app\models\SliderImageUpload;


?>
<div class="row">
<div class="col-sm-5 post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true])->label('Изображение') ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<div class="col-sm-7">
    <div class="img-adm-login">
        <img src="/images/user/adm-gif-1.gif" alt="">
    </div>
</div>
</div>