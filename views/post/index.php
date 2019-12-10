<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Post;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;
?>

<?php
 $this->params['breadcrumbs'][] = ['label' => 'Новости'];
?>

<div class="container adm">
 <a id="ios-back" onclick="javascript:history.back(); return false;" сlass=""> <img сlass="ios-back" src="/images/home/icons8-long-arrow-left-50.png" alt=""></a>
<h1>Новости</h1>
<div class="row">
<?php if(count($model)): ?>
	<?php foreach ($model as $item): ?>
		<?php $img = $item->getImage();?>

		<div class="well col-sm-4">
			<a href="<?= \yii\helpers\Url::to(['post/show', 'id' => $item->id]) ?>"><?= Html::img($img, ['alt' => $item->title, 'width'=>'100%'])?></a>
			<h3><a href="<?= \yii\helpers\Url::to(['post/show', 'id' => $item->id]) ?>"><?=$item->title?></a></h3>
			<p class="anons-news-adm"><?=$item->anons?></p>


</div>


	<?php endforeach ?>
<?php endif?>
</div>
<?= LinkPager::widget([
    'pagination' => $pages,
]); ?>
</div>
