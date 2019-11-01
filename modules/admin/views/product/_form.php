<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use mihaildev\elfinder\ElFinder;
use yii\widgets\ActiveForm;
mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

<div class="form-group field-product-category_id required has-success">
    <label class="control-label" for="product-category_id">Родительская категория</label>
        <select id="category-parent_id" class="form-control" name="Product[category_id]" aria-required="true" aria-invalid="false">
            <?= \app\components\MenuWidget::widget(['tpl' => 'select_product', 'model' => $model]) ?>
        </select>
</div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

     <?php

        echo $form->field($model, 'content')->widget(CKEditor::className(), [
          'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),

        ]);

    ?>


     <?php echo $form->field($model, 'lkimg')->widget(CKEditor::className(), [
          'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
           ]);
     ?>

    <?= $form->field($model, 'price')->textInput() ?>
    <?= $form->field($model, 'stock_price')->textInput() ?>

<?php $items = [
        'S' => 'S',
        'M' => 'M',
        'XL'=> 'XL'
    ];
    $params = [
    ];

   echo $form->field($model, 'size')->dropDownList($items,$params);


?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hit')->checkBox([ '0', '1', ]) ?>

    <?= $form->field($model, 'new')->checkBox([ '0', '1', ]) ?>

    <?= $form->field($model, 'sale')->checkBox([ '0', '1', ]) ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
