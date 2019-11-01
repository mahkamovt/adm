<?php

/* @var $this \yii\web\View */
/* @var $content string */
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\LtAppAsset;
use yii\db\ActiveRecord;
use app\models\Cart;
AppAsset::register($this);
LtAppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <?= Html::csrfMetaTags() ?>
    <title>Личный кабинет | <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head><!--/head-->

<body id="admin-panel">
	<?php $this->beginBody() ?>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?= \yii\helpers\Url::home()?>">
 <?=Html::img("@web/images/home/logo.png", ['alt' => 'ADM', 'style' => 'height: 39px;'] )?>

							</a>


						</div>

					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							<?php if(!Yii::$app->user->isGuest): ?>
		<li><a href="<?= \yii\helpers\Url::to(['/site/logout'])?>"><i class="fa fa-user"></i> <?=Yii::$app->user->identity['username']?> (Выход)</a></li>
<?php endif;?>
								<?php if(!Yii::$app->user->isGuest): ?>
								<?php else:?>
									<li><a href="<?= \yii\helpers\Url::to(['/admin'])?>"><i class="fa fa-lock"></i> Войти</a></li>
								<?php endif;?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

	<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
<div class="container adm-breadcrumbs">
 <?= Breadcrumbs::widget([
 		    'homeLink' => ['label' => 'Главная', 'url' => '/'],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
</div>
<div class="container admin-panel">
<?php if( Yii::$app->session->hasFlash('success') ): ?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-lable="Close">
				<span aria-hidden="true">&times;</span></button>
				<?php echo Yii::$app->session->getFlash('success'); ?>
			</div>
		<?php endif; ?>
<?=$content; ?>

</div>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>