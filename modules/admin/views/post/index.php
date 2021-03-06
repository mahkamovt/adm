<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить новость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'title',
            //'anons',
           // 'description:ntext',
          //  'user_id',
            [

                'format' => 'html',
                'label' => 'Главное изображение',
                'value' => function($data){
                    return Html::img($data->getImage(), ['width'=>200]);
                }



            ],
            [

                'format' => 'html',
                'label' => 'Баннер',
                'value' => function($data){
                    return Html::img($data->getBanner(), ['width'=>200]);
                }



            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
