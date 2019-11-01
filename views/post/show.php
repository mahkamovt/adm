<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Post;
use yii\widgets\Breadcrumbs;
?>
<?php
$img = $model->getBanner();
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => '/post'];
$this->params['breadcrumbs'][] = ['label' => $model->title,];
?>
<div class="container adm">
	 <a id="ios-back" onclick="javascript:history.back(); return false;" сlass=""> <img сlass="ios-back" src="/images/home/icons8-long-arrow-left-50.png" alt=""></a>
<div class="news-banner">
<?= Html::img($img, ['alt' => $model->title, 'width'=>'100%'])?>
<h1 class="news-header"><?=$model->title ?></h1>
</div>
<p><?=$model->description ?></p>

</div>