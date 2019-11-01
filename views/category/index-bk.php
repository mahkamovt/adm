<?php

/* @var $this yii\web\View */

//$this->title = 'ADM shop';
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;
use app\models\Cart;
use app\modules\admin\models\Slider;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
?>


<div class="preloader">
   <div class="prePreloader">
  <div id="adm-loader"><?=Html::img("@web/images/home/logo.png", ['alt' => 'ADM', 'style' => 'height: 39px;'] )?></div>
   </div>
</div>

<?php

?>
<!--Вывод флеш собщений о успешном заказе-->
    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-lable="Close">
                <span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif; ?>
    <section id="advertisement" class="video-adm">

        <img src="/images/shop/adm-banner2.jpg" alt="">
             <video width="100%" class="inner-video-adm" autoplay="autoplay" loop="loop" muted>
   <source src="/video/ADM.mp4" type='video/mp4;'>
  </video>
<?php if(count($model)): ?>
    <?php foreach ($model as $item): ?>
  <h3><a class="header-video-news"href="<?= \yii\helpers\Url::to(['category/stock']) ?>">-20 процентов на новую коллекцию</a></h3>
    <?php endforeach ?>
<?php endif?>
    </section>

    <!--slider-->

    <section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1>ADM SHOP</h1>
                                    <h2>Амбассадор бренда</h2>
                                    <p>Посол бренда (в русском языке иногда также используют «амбассадор бренда» или «бренд-амбассадор») — это человек, который представляет бренд в позитивном свете и тем самым способствовать повышению узнаваемости бренда.</p>
                                    <button type="button" class="btn btn-default get">Чекнуть</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />

                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1>ADM SHOP</h1>
                                    <h2>Амбассадор бренда</h2>
                                    <p>Посол бренда (в русском языке иногда также используют «амбассадор бренда» или «бренд-амбассадор») — это человек, который представляет бренд в позитивном свете и тем самым способствовать повышению узнаваемости бренда.</p>
                                    <button type="button" class="btn btn-default get">Глянуть</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />

                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1>ADM SHOP</h1>
                                    <h2>Амбассадор бренда</h2>
                                    <p>Посол бренда (в русском языке иногда также используют «амбассадор бренда» или «бренд-амбассадор») — это человек, который представляет бренд в позитивном свете и тем самым способствовать повышению узнаваемости бренда.</p>
                                    <button type="button" class="btn btn-default get">Посмотреть</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />

                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--/slider-->


  <div class="col-sm-12 ">
                     <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators car-ind-pos">
                           <?php  foreach($slides as $key => $slide): ?>
                           <li data-target="#slider-carousel" data-slide-to="<?php echo $key;?>" class="mob-carusel-nav<?php if($key == 0) echo ' active'?>"></li>
                           <?php endforeach;?>
                        </ol>
                        <div class="carousel-inner">
                           <?php foreach($slides as $key => $slide): ?>
                           <div class="item <?php if($key == 0) echo ' active'?>">
                             <?= $slide->title ?>
                           </div>
                           <?php endforeach;?>
                        </div>
                     </div>
                  </div>

















    <section>
        <div class="container adm">
            <div class="row">
                <div class="col-sm-3 adm-category">
                    <div class="left-sidebar">
                        <h2>Одежда ADM</h2>
                        <ul class="catalog category-products">
                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu']) ?>
                        </ul><!--/category-products-->


                        <div class="shipping text-center"><!--shipping-->
	<h2>Новости</h2>




                           <!-- <img src="images/home/shipping.jpg" alt="" />-->


<?php if(count($model)): ?>
    <?php foreach ($model as $item): ?>
        <?php $img = $item->getMainimage();?>

        <div class="well col-sm-12 on-main-news">

            <a href="<?= \yii\helpers\Url::to(['post/show', 'id' => $item->id]) ?>"><?= Html::img($img, ['alt' => $item->title, 'width'=>'100%'])?></a>
            <h3><?=$item->title?></h3>
</div>


    <?php endforeach ?>
<?php endif?>



                        </div><!--/shipping-->
                    </div>
                </div>
                <div class="col-sm-9 padding-right">
                    <?php if( !empty($hits) ):?>
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Хиты продаж</h2>
                        <?php foreach ($hits as $hit): ?>
                        <?php $mainImg = $hit->getImage();?>
                        <div class="col-sm-4 col-xs-6 ">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">

                      <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"> <?= Html::img($mainImg->getUrl('250x250'), ['alt' => $hit->name])?></a>

<?php if(!empty($hit->stock_price) ):?>
<h2> <?= $hit->stock_price?> ₽ <strike><?= $hit->price?> ₽</strike></h2>

 <?php else:?>
<h2><?= $hit->price?> ₽</h2>

 <?php endif?>


                                            <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>" class="adm-name-product"><?= $hit->name?></a></p>
                                            <a href="#" data-id="<?= $hit->id ?>"  class="btn btn-default add-to-cart"><img class="adm-cart-product" src="/images/home/icons8-shopping-bag-filled-50.png"></a>


<!-- Быстрый просмотр-->
<?php
            Modal::begin([
            'toggleButton' => [
            'class' => 'adm-fast-view',
            'title' => 'Быстрый просмотр',
            'data-trigger' => 'hover',



        ],
                'size' => 'modal-lg',
                'footer' => '<a href="'. \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) . '"  class="btn btn-adm-more">Подробнее</a>'

                                ]);
?>

<section>
        <div class="container adm-modal">
        <?php
            $mainImg = $hit->getImage();
            $gallery = $hit->getImages();
            ?>
                <div class="col-sm-12">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-6">
                            <div class="view-product">
                     <?=Html::img($mainImg->getUrl(), ['alt' => $hit->name])?>
                      <?php if($hit->new):?>
                    <?=Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'newarrival'])?>
                <?php endif?>

                <?php if($hit->sale):?>
                    <?=Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'newarrival'])?>
                <?php endif?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="product-information"><!--/product-information-->
                    <div class="adm-name-modal"><?= $hit->name?></div>
       			 <div class="adm-modal-content-product"><?= $hit->content?></div>

                </div>

            </div>
        </div>
    </div>
</div>
                </section>



        <?php Modal::end();?>


                                        </div>
                                     <!--   <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>$<?= $hit->price?></h2>
                                                <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>" ><?= $hit->name?></a></p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div> -->
                                         <?php if($hit->new):?>
                    <?=Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new'])?>
                <?php endif?>

                <?php if($hit->sale):?>
                    <?=Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new'])?>
                <?php endif?>
                                </div>

                            </div>
                        </div>
                        <?php endforeach;?>
                    </div><!--features_items-->
                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>