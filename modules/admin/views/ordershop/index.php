<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordershop-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?php /*  <?= Html::a('Create Ordershop', ['create'], ['class' => 'btn btn-success']) ?>*/ ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',

            [
                'attribute' => 'status',
                'value' => function($data) {
                    return !$data->status ? '<span class="text-danger">Активен</span>' :
                    '<span class="text-success">Завершен</span>';

                },
            'format' => 'raw',/*Чтобы распознавался HTML*/
            ],
            //'status',
            //'name',
            //'email:email',
            //'phone',
            //'address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
