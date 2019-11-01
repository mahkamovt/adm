<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Slider;
use app\models\SliderImageUpload;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Slider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Слайдер', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="slider-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Изображение', ['set-slider', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот слайд?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
             [

                'format' => 'html',
                'label' => 'Изображение',
                'value' => function($data){
                    return Html::img($data->getSliderimage(), ['width'=>200]);
                }



            ],
            'title',
            'description',
            'button',
        ],
    ]) ?>

</div>
