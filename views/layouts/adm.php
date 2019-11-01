
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAdm;
use app\assets\LtAppAsset;
use yii\db\ActiveRecord;
use app\models\Cart;

AppAdm::register($this);
LtAppAsset::register($this);
?>
<?php $this->beginPage() ?>


<!DOCTYPE html>

<html data-page="personal" lang="<?= Yii::$app->language ?>">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, shrink-to-fit=no">
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
	<meta name="robots" content="noodp">
	<meta name="description" content="This is the personal website of Bogoroditsk based photographers Mahkamov Timur and Anufriev Dmitry">
<style>

/* Add slashes to navigation */
	nav a:before { content: "// "; }

/* Navigation effects */
	nav a {
		position: relative;
		left: 0;
		-webkit-transition: left .25s ease-out;
		-moz-transition: left .25s ease-out; }
	nav .selected a,
	nav a:hover {
		left: -5px;
		text-shadow: rgba(0,0,0,.5) 0 0 1px; }

/* CSS: Change logo and text color if body class is found */
.white nav a, .white footer { color: #fff; }

.smallText { font-size: 6px; /* adjust px to suit */ }

/* Align sideways-scrolling images to the top of page rather than center */
	.sidescroll .images { line-height: 0 !important; }
	.sidescroll .images li { margin-top: 62px; vertical-align: top; }

</style>
	<!-- Internet Exploder -->
	<!--[if lt IE 8]><script type="text/javascript">window.location="http://usestandards.com/upgrade?url="+document.location.href;</script><![endif]-->
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<meta http-equiv="imagetoolbar" content="no">
	<![endif]-->

<link rel="icon" type="image/png" href="http://www.cameronrad.com/favicon.png">
<body id="page-personal" class="left nobleed webkit">
<?php $this->beginBody() ?>
<div id="layout">
	<header>
		<h1>
		<a href="<?= \yii\helpers\Url::home()?>" target="_blank">
			<img src="/img/logoblack.png" alt="ADM | Photography">
			<span>ADM | Commercial</span>
			</a>
		</h1>
		<nav style="height: auto;">
	<ul>
<li class="personal"><a href="<?= \yii\helpers\Url::to(['adm/index'])  ?>"  style="color: rgb(0, 0, 0);">commercial</a></li>
<li class="personal "><a href="<?= \yii\helpers\Url::to(['adm/portraits'])  ?>"  style="color: rgb(0, 0, 0);">portraits</a></li>
<li class="about "><a href="<?= \yii\helpers\Url::to(['adm/about'])  ?>" title="About" style="color: rgb(0, 0, 0);">About</a></li>
			</ul>
		</nav>
	</header>
	<?=$content; ?>
	<footer class="show" style="width: 210px;">
<ul class="links icons">
		<li><a href="https://vk.com/dopeadm" target="blank"><img style="height: 24px; width: 24px;" src="/img/vk_2b.png"></a></li>
		<li><a href="https://www.instagram.com/adm_tula/" target="_blank"><img style="height: 24px; width: 24px;" src="/img/instagramb.png"></a></li>
		<li><a href="#" target="_blank"><img style="height: 24px; width: 24px;" src="/img/twitterb.png"></a></li>
</ul>

<p class="copyright" style="color: rgb(0, 0, 0);">© ADM | Photography</p>
	</footer>
</div>
<?php $this->endBody() ?>
</body>

</head>
</html>
<?php $this->endPage() ?>