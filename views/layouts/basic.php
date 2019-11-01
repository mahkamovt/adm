<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppParallel;
use yii\helpers\Url;


AppParallel::register($this);
?>
<?php $this->beginPage() ?>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta name="viewport" content="width=500">
  <meta name="generator" content="Webflow">
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="">
  <link rel="apple-touch-icon" href="">
  <link rel="shortcut icon" href="img/favicon.png" type="image/png">
   <title><?= $this->title ?></title>
   <?php $this->head() ?>
</head>

<body>
 <?php $this->beginBody() ?>

  <div class="w-hidden-main">
    <div class="w-hidden-main w-clearfix mobile-menu">
      <a href="" class="w-inline-block mobile-logo">
      	<img width="180" src=" <?=Url::toRoute('/img/logo.png')?> ">
      </a>
      <div data-ix="open-menu" class="w-nav-button w-hidden-main menu-btn"><a id="nav-toggle" href="#"><span></span></a></div>
    </div>

    <div class="w-hidden-main w-clearfix menu-open">
    	<a href="#our-work" class="nav-link">Наши работы</a>
    	<a href="#about" class="nav-link">О нас</a>
    	<a href="#contact" class="nav-link">Связаться</a>

    </div>
  </div>

  <div data-collapse="none" data-animation="default" data-duration="400" class="w-nav w-hidden-medium w-hidden-small w-hidden-tiny w-preserve-3d side-nav">
 <a href="#" class="w-inline-block fuzz-logo" style="transition: transform 500ms; transform: translateX(0px) translateY(0px) translateZ(0px) scaleX(1) scaleY(1) scaleZ(1);"><img style="margin-top: 10px;" width="180" src="<?=Url::toRoute('/img/logo.png')?> ">
    </a>


    <nav role="navigation" class="w-nav-menu nav-menu" style="transition: transform 500ms; transform: translateX(0px) translateY(0px) translateZ(0px);">

    	<?= Html::a('Статьи', Url::toRoute('post/show'), ['class'=>'w-nav-link nav-link', 'target' => '_blank'])?>
    		<?= Html::a('Блог', ['post/index'], ['class'=>'w-nav-link nav-link', 'target' => '_blank'])?>
    	<a href="#our-work" class="w-nav-link nav-link">Наши работы</a>
    	<a href="#about" class="w-nav-link nav-link">О нас</a>
    	<a href="#contact" class="w-nav-link nav-link">Связаться с нами</a>
    </nav>
    <div class="w-nav-button w-hidden-main menu-btn"><img width="39" src="<?=Url::toRoute('/img/ham@3x.png')?>">
    </div>
    <div class="nav-back" style="transition: opacity 500ms, height 500ms; opacity: 0; height: 103px;"></div>
  <div class="w-nav-overlay" data-wf-ignore=""></div></div>

  <div id="" data-id="" class="formobile" style="width: 100%;height: 0%;">
          <video muted="" autoplay="true" autobuffer="true" loop="true" preload="true" poster=""  class="black" style="width:100%;">
		  <source src="<?=Url::toRoute('/video/herovideo.mp4')?>" type="/video/webm">
		  <source src="<?=Url::toRoute('/video/herovideo.mp4')?>" type="/video/quicktime"></video>

        </div>
  <div id="three" class="w-embed w-script w-hidden-medium w-hidden-small w-hidden-tiny desktop">

        <script>
        if (screen && screen.width > 991) {
          document.write('<script type="text/javascript" src="js/home.min.js"><\/script>');
        }
        </script>



        <canvas width="1920" height="935" style="width: 1920px; height: 935px;"></canvas>

  </div>

  <div data-ix="shrinky" class="w-section home-hero">
    <div class="hero-copy" data-ix="fade-in-on-load" style="opacity: 1; display: block; transition: opacity 500ms;">

      <h2 class="sub-heading">Think. Define. Design.</h2>
      <h1 data-ix="new-interaction" class="large-heading">Курс на превосходство</h1><a href="#contact" class="w-button site-cta">Заказать работу</a>

    </div>
  </div>
  <div id="our-work" data-animation="slide" data-duration="500" data-infinite="1" data-hide-arrows="1" class="w-slider cs-slider">

<?php if( isset($this->blocks['block1']) ): ?>
<?php echo $this->blocks['block1'] ?>
<?php endif; ?>

<?= $content ?>

  </div>
  <div id="about" class="w-section about-fuzz">
    <div class="w-container tight">
      <h1>О нас</h1>
      <div class="divider-line"></div>
		<p style="font-size:17px;">TheParallel™ — это небольшое, но универсальное digital-агенство, расположенное в Туле. Мы предоставляем высококачественную разработку и красивый дизайн для всех наших сайтов.
        <br>
        <br>Наша работа сосредоточена на детальной проработке дизайна на всех уровнях (IA/UI/Контент дизайн). По окончанию разработки мы проводим SEO оптимизацию сайта по более чем 60-ти параметрам, что позволит вам сэкономить на последующей работе с seo-компаниями или отдельными seo-оптимизаторами.
Мы работаем с любыми проектами, от промо-сайтов до интернет-магазинов. </p>
    </div>

  </div>
  <div class="w-section brands">
    <h1 class="brands-header">Разработчики студии получали и совершенствовали свои навыки здесь</h1>
    <div class="w-clearfix grid">
      <div class="grid-item-5"><img width="100%" src="<?=Url::toRoute('/img/Nike@3x.png')?>">
      </div>
      <div class="grid-item-5"><img width="100%" src="<?=Url::toRoute('/img/Gaming Insiders@3x.png')?>">
      </div>
      <div class="grid-item-5"><img width="100%" src="<?=Url::toRoute('/img/asinc@3x.png')?>">
      </div>
      <div class="grid-item-5"><img width="100%" src="<?=Url::toRoute('/img/Samsung@3x.png')?>">
      </div>
      <div class="grid-item-5"><img width="100%" src="<?=Url::toRoute('/img/intel@3x.png')?>">
      </div>

    </div>
  </div>


  <div id="contact" class="w-section contact-us">
    <div class="w-container contact-contain tight">
      <h1>Напишите нам</h1>

      <?php if( isset($this->blocks['block2']) ): ?>
<?php echo $this->blocks['block2'] ?>
<?php endif; ?>
      <div class="divider-line"></div>
      <div class="w-form">

      </div>
    </div>

  </div>

    <script>
            document.querySelector( "#nav-toggle" )
          .addEventListener( "click", function() {
            this.classList.toggle( "active" );
          });
    </script>




 <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>