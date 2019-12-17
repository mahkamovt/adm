
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Slider;
use app\models\SliderImageUpload;

$this->title = 'Изображение';
$this->params['breadcrumbs'][] = ['label' => 'Слайды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<div class="col-sm-12 post-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="upload-image">
    <?= $form->field($model, 'image')->fileInput(['maxlength' => true])->label('Изображение') ?>

</div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>