<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?php $img = $model->getImage();?>


    <?= DetailView::widget([

        'model' => $model,
        'attributes' => [

            [
                'attribute' => 'image',
                'value' => "<img src='{$img->getUrl('250x250')}'>",
                'format' => 'raw'
            ],
            'id',
             [
                'attribute' => 'category_id',
                'value' => function($data){
                    return $data->category->name;

                },


            ],
            'name',
            'content:html',
            'size',
            'price',
            'stock_price',
            'keywords',
            'description',
          [
                'attribute' => 'hit',
                'value' => function($data){
                    return !$data->hit ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';

                },
                'format' => 'raw',
            ],

            [
                'attribute' => 'new',
                'value' => function($data){
                    return !$data->new ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';

                },
                'format' => 'raw',
            ],

            [
                'attribute' => 'sale',
                'value' => function($data){
                    return !$data->sale ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';

                },
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
