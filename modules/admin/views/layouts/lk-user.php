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
   use app\assets\JasnyBootstrapAsset;
   use yii\db\ActiveRecord;
   use app\models\Cart;

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
      <?= Html::csrfMetaTags() ?>
      <title><?= Html::encode($this->title) ?></title>
      <?php $this->head() ?>
     <link rel="apple-touch-icon" sizes="57x57" href="/images/ico/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/images/ico/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/images/ico/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/images/ico/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/images/ico/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/images/ico/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/images/ico/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/images/ico/apple-icon-152x152.png">
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
      <section class="tt" data-mcs-theme="dark">
         <?php $this->beginBody() ?>
         <header id="header">
            <!--header-->

            <div class="header-middle user-middle">
               <!--header-middle-->
               <div class="container user-container">
                  <div class="row user-panel">
                     <div class="col-sm-12">
                        <div class="logo pull-user">
                           <a href="<?= \yii\helpers\Url::home()?>">
                           <?=Html::img("@web/images/home/logo.png", ['alt' => 'ADM'])?>
                           </a>
                        </div>

                     </div>

                  </div>
               </div>
            </div>
            <!--/header-middle-->

            <!--/header-bottom-->
         </header>
         <!--/header-->
         <?php if( isset($this->blocks['block2']) ): ?>
         <?php echo $this->blocks['block2'] ?>
         <?php endif; ?>

         <div class="container adm-breadcrumbs">
 <?= Breadcrumbs::widget([
        'homeLink' => ['label' => 'Личный кабинет', 'url' => '/account'],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
</div>

         <?=$content; ?>

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