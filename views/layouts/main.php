<?php
/* @var $this \yii\web\View */
/* @var $content string */


use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\LtAppAsset;
use app\assets\JasnyBootstrapAsset;


AppAsset::register($this);
LtAppAsset::register($this);
JasnyBootstrapAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" >
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
  		<meta name="mobile-web-app-capable" content="yes" />
      	<meta name="apple-touch-fullscreen" content="yes" />
        <meta name="apple-mobile-web-app-title" content="ADM" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link href="/images/ico/splash/iphone5_splash.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
		<link href="/images/ico/splash/iphone6_splash.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
		<link href="/images/ico/splash/iphoneplus_splash.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
		<link href="/images/ico/splash/iphonex_splash.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
		<link href="/images/ico/splash/iphonexr_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
		<link href="/images/ico/splash/iphonexsmax_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
		<link href="/images/ico/splash/ipad_splash.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
		<link href="/images/ico/splash/ipadpro1_splash.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
		<link href="/images/ico/splash/ipadpro3_splash.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
		<link href="/images/ico/splash/ipadpro2_splash.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
        <link rel="apple-touch-icon" sizes="57x57" href="/images/ico/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/images/ico/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/images/ico/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/images/ico/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/images/ico/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/images/ico/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/images/ico/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/images/ico/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/images/ico/apple-icon-180x180.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/images/ico/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/images/ico/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/ico/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/images/ico/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/ico/favicon-16x16.png">
        <link rel="manifest" href="/images/ico/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/images/ico/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

    </head>
    <!--/head-->

    <body>
    	<button type="button" class="ad2hs-prompt">Установить веб приложение</button>
    	<div class="ios-prompt">
	      <span class="close-ios-prompt">&times;</span>
	      <img src="/images/ico/app-adm.png" class="share">
	      <p>Чтобы установить это приложение на ваш iPhone/iPad нажмите <img src="/images/ico/icons8-share-rounded-30.png" class="add2home"> и потом нажмите на экран «Домой»</p>
	    </div>

    	<script>
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', function() {
                    navigator.serviceWorker.register('/sw.js').then(function(registration) {
                        // Регистрация успешна
                        console.log('ServiceWorker registration successful with scope: ', registration.scope);
                    }).catch(function(err) {
                        // Регистрация не успешна
                        console.log('ServiceWorker registration failed: ', err);
                    });
                });
            }

             function addToHomeScreen() {
                    let a2hsBtn = document.querySelector(".ad2hs-prompt");  // hide our user interface that shows our A2HS button
                    a2hsBtn.style.display = 'none';  // Show the prompt
                    deferredPrompt.prompt();  // Wait for the user to respond to the prompt
                    deferredPrompt.userChoice
                      .then(function(choiceResult){
                    if (choiceResult.outcome === 'accepted') {
                      console.log('User accepted the A2HS prompt');
                    } else {
                      console.log('User dismissed the A2HS prompt');
                    }
                    deferredPrompt = null;
                  });}
                  function showAddToHomeScreen() {
                    let a2hsBtn = document.querySelector(".ad2hs-prompt");
                    a2hsBtn.style.display = "block";
                    a2hsBtn.addEventListener("click", addToHomeScreen);
                  }
                  let deferredPrompt;
                  window.addEventListener('beforeinstallprompt', function (e) {
                    // Prevent Chrome 67 and earlier from automatically showing the prompt
                    e.preventDefault();
                    // Stash the event so it can be triggered later.
                    deferredPrompt = e;
                    showAddToHomeScreen();
                  });

                  function showIosInstall() {
                    let iosPrompt = document.querySelector(".ios-prompt");
                    //localStorage.setItem("show_app", 0);
                    if (localStorage.getItem("show_app") != 1){
                        iosPrompt.style.display = "block";
                    }
                    iosPrompt.addEventListener("click", () => {
                        iosPrompt.style.display = "none";
                        localStorage.setItem("show_app", 1);
                    });
                  }

                  function iOsNavigation() {
            		let footerApp = document.querySelector("#footer");
                  	 footerApp.style.display = "none";
                  }

                  // Detects if device is on iOS
                  const isIos = () => {
                    const userAgent = window.navigator.userAgent.toLowerCase();
                    return /iphone|ipad|ipod/.test( userAgent );
                  }
                  // Detects if device is in standalone mode
                  const isInStandaloneMode = () => ('standalone' in window.navigator) && (window.navigator.standalone);
                  // Checks if should display install popup notification:
                  if (isIos() && !isInStandaloneMode()) {
                    // this.setState({ showInstallMessage: true });
                    showIosInstall();

                  }




                window.addEventListener("load", function(){
                    if (isIos() && isInStandaloneMode()) {
                   iOsNavigation();
                    }

                });


</script>


    <section class="tt" data-mcs-theme="dark">
        <?php $this->beginBody() ?>
        <header id="header">
            <!--header-->
            <div class="header_top">
                <!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i>+7 (920) 753 87 05</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> adm@icloud.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-vk"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header_top-->
            <!--Мобильная навигация -->

            <nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas" role="navigation">
                <!--Акционный баннер -->
                <section id="advertisement" class="mob-nav-banner">
                    <div class="container">
                        <img src="/images/shop/adm-banner.jpg" alt="" />
                    </div>
                </section>
                <!--/Акционный баннер-->
                <!--Мобильный поиск-->
                <div class="search_box mob-search-adm">
                    <form method="get" action="<?= \yii\helpers\Url::to(['category/search'])  ?>" >
                        <input type="text" placeholder="Поиск" name="q"/>
                    </form>
                </div>
                <!--/Мобильный поиск-->
                <ul class="catalog category-products">
                    <!-- Подключение виджета меню категорий для мобильных телефонов -->
                    <?= \app\components\MenuWidget::widget(['tpl' => 'menu']) ?>
                    <!-- /Подключение виджета меню категорий для мобильных телефонов -->
                    <hr>
                    <li><a href="<?= \yii\helpers\Url::home()?>">Главная</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['post/index'])  ?>">Новости</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['delivery/index'])  ?>">Условия доставки</a></li>
                    <li><a href="https://vk.com/dopeadm">ADM style</a></li>
                    <?php if(!Yii::$app->user->isGuest): ?>
                        <li><a href="<?= \yii\helpers\Url::to(['/site/logout'])?>">Выйти</a></li>
                    <?php endif;?>
                    <hr>
                    <li><a href="#"><i class="fa fa-phone"></i>+7 (920) 753 87 05</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i> adm@icloud.com</a></li>
                </ul>
                <div class="social-icons pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><i class="fa fa-vk"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </nav>

            <div class="navbar navbar-default navbar-fixed-top">
                <button type="button" class="navbar-toggle adm-toggle" data-toggle="offcanvas" data-target="#myNavmenu" data-canvas="body" aria-label="toggleMenu">
                    <span class="icon-bar adm-bar"></span>
                    <span class="icon-bar adm-bar"></span>
                    <span class="icon-bar adm-bar"></span>
                </button>
                <div class="logo pull-adm">
                    <a href="<?= \yii\helpers\Url::home()?>">
                        <?=Html::img("@web/images/home/logo.png", ['alt' => 'ADM', 'style' => 'height: 39px;', 'class' => 'adm-logo-mob'] )?>
                    </a>
                </div>
                <div class="cart-nav-mob">
                    <a href="#" onclick="return getCart()">
                        <img class="adm-cart-product" src="/images/home/icons8-shopping-bag-filled-50.png" alt=""><span><?php echo $cartcount = $this->params['cartcount'];?></span></a>
                </div>


                <div class="cart-nav-mob">
                    <?php if(!Yii::$app->user->isGuest): ?>
                        <a href="/account">
                            <img class="adm-cart-product" src="/images/home/icons8-checked-user-male-50.png" alt=""></a>
                    <?php else:?>
                        <a href="/account">
                            <img class="adm-cart-product" src="/images/home/icons8-account-filled-50.png" alt=""></a>
                    <?php endif;?>
                </div>
   <?php if(Yii::$app->user->isGuest): ?>
                <div class="cart-nav-mob">

                        <a href="<?= \yii\helpers\Url::to(['/rbac/user/signup'])?>">
                            <img class="adm-cart-product" src="/images/home/icons8-registration-50.png" alt=""></a>

                </div>
<?php else:?>
            <div class="cart-nav-mob">

                        <a href="<?= \yii\helpers\Url::to(['/site/logout'])?>">
                        <img class="adm-cart-product" src="/images/home/icons8-exit-50.png" alt=""></a>

                </div>
 <?php endif;?>
            </div>
            <!-- /Мобильная навигация -->
            <div class="header-middle">
                <!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="<?= \yii\helpers\Url::home()?>">
                                    <?=Html::img("@web/images/home/logo.png", ['alt' => 'ADM', 'style' => 'height: 39px;', 'class' => 'adm-logo'] )?>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <?php if(!Yii::$app->user->isGuest): ?>
                                        <li><a href="<?= \yii\helpers\Url::to(['/site/logout'])?>"><i class="fa fa-user"></i> <?=Yii::$app->user->identity['username']?> (Выход)</a></li>
                                    <?php endif;?>
                                    <li><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i>Корзина<span> <?php
                                                // echo $cartcount = $this->params['cartcount'];
                                                ?></span></a></li>
                                    <?php if(!Yii::$app->user->isGuest): ?>
                                        <!--      <li><a href="<?= \yii\helpers\Url::to(['/admin'])?>"><i class="fa fa-lock"></i> Админ - панель</a></li>-->
                                        <li><a href="<?= \yii\helpers\Url::to(['/admin/ordersuser'])?>"><i class="fa fa-lock"></i>Личный кабинет</a></li>
                                    <?php else:?>
                                        <li><a href="<?= \yii\helpers\Url::to(['/admin/ordersuser'])?>"><i class="fa fa-user" aria-hidden="true"></i> Личный кабинет</a></li>
                                        <li><a href="<?= \yii\helpers\Url::to(['/rbac/user/signup'])?>"><i class="fa fa-lock"></i> Регистрация</a></li>
                                    <?php endif;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header-middle-->
            <div class="header-bottom">
                <!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="<?= \yii\helpers\Url::home()?>">Главная</a></li>
                                    <li><a href="<?= \yii\helpers\Url::to(['post/index'])  ?>">Новости</a></li>
                                    <li><a href="<?= \yii\helpers\Url::to(['delivery/index'])  ?>">Условия доставки</a></li>
                                    <li><a href="https://vk.com/dopeadm">ADM style <i class="fa fa-trademark" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="search_box pull-right">
                                <form method="get" action="<?= \yii\helpers\Url::to(['category/search'])  ?>" >
                                    <input type="text" placeholder="Поиск" name="q"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header-bottom-->
        </header>
        <!--/header-->
        <?php if( isset($this->blocks['block2']) ): ?>
            <?php echo $this->blocks['block2'] ?>
        <?php endif; ?>
        <div class="container adm-breadcrumbs">
            <?= Breadcrumbs::widget([
                'homeLink' => ['label' => 'Главная', 'url' => '/'],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>
        <?=$content; ?>
        <footer id="footer" сlass="navbar-fixed-bottom">
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Информация</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="<?= \yii\helpers\Url::to(['delivery/index'])  ?>">Условия доставки</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Лучшие категории</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="/category/18">ADM - футболки</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Политика</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Гарантия качества</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>О ADM</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="https://vk.com/dopeadm">ADM photo</a></li>
                                    <li><a  href="<?= \yii\helpers\Url::to(['adm/index'])  ?>">ADM style</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-1 adm-soc-footer">
                            <div class="single-widget">
                                <div class="social-icons pull-right">
                                    <ul class="nav navbar-nav">
                                        <li><a href="#"><i class="fa fa-vk"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2019 ADM All rights reserved.</p>
                        <p class="pull-right">Designed by <span><a target="_blank" href="https://vk.com/timurmahkamov">TheParallel</a></span></p>
                    </div>
                </div>
            </div>
            <script>

            </script>
        </footer>
        <!--/Footer-->
        <?php
        \yii\bootstrap\Modal::begin([
            'header' => '<h2>Корзина</h2>',
            'id' => 'cart',
            'size' => 'modal-lg',
            'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                <a href="'. \yii\helpers\Url::to(['cart/view']) . '"  class="btn btn-success">Оформить заказа</a>
                <button type="button" class="btn btn-danger" onclick="clearCart()" >Очистить корзину</button>'

        ]);

        \yii\bootstrap\Modal::end();
        ?>

    </section>

    <?php $this->endBody() ?>

    </body>
    </html>
<?php $this->endPage() ?>