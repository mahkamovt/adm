<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту категорию',
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
           // 'parent_id',
            [
                'attribute' => 'parent_id',
                'value' => isset($model->category->name) ? $model->category->name : 'Самостоятельная категория',

            ],
            'keywords',
            'description',
        ],
    ]) ?>

</div>
