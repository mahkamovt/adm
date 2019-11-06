<?php
   /* @var $this yii\web\View */

   //$this->title = 'ADM shop';
   use yii\helpers\Html;
   use yii\widgets\LinkPager;
   use yii\widgets\Breadcrumbs;
   use app\models\HtmlExtend;
   use app\models\Cart;
   use app\modules\admin\models\Slider;
   use yii\widgets\ActiveForm;
   use yii\bootstrap\Modal;
   ?>

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
   <?php if(count($model)): ?>
   <?php foreach ($model as $item): ?>
   <h3><a class="header-video-news"href="<?= \yii\helpers\Url::to(['category/stock']) ?>" aria-label="">-20 процентов на новую коллекцию</a></h3>
   <?php endforeach ?>
   <?php endif?>
</section>

<section id="categoryHitOnMain">

    <div class="container">
      <div class="row">
      <div class="col-sm-12">
      <?php foreach ($categoryHits as $categoryHit) :?>
      <?php $categoryImg = $categoryHit->getImage();?>
         <div class="col-sm-4 category_hits">
            <p class="category_hits_title">
               <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $categoryHit['id']])?>" target="_blank" aria-label="<?= $categoryHit->name?>"><?= $categoryHit->name?>
            </p>
              <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $categoryHit['id']])?>" target="_blank" aria-label="<?= $categoryHit->name?>">
              	<img class="lazy" src="/images/home/Eclipse-4.2s-200px.svg" data-original="<?= $categoryImg->getUrl('250x250')?>" alt="<?= $categoryHit->name?>">
              </a>
         </div>
    <?php endforeach;?>

</div>
</div>
</div>
</section>
<!--slider-->
<section id="slider">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div id="slider-carousel" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators car-ind-pos">
                  <?php  foreach($slides as $key => $slide): ?>
                  <li data-target="#slider-carousel" data-slide-to="<?php echo $key;?>" class="mob-carusel-nav<?php if($key == 0) echo ' active'?>"></li>
                  <?php endforeach;?>
               </ol>
               <div class="carousel-inner">
                  <?php foreach($slides as $key => $slide): ?>
                  <?php $img = $slide->getImage();?>
                  <div class="item <?php if($key == 0) echo ' active'?>">
                     <div class="col-sm-6">
                        <h1><?= $slide->title ?></h1>
                        <p><?= $slide->description ?></p>
                        <button type="button" class="btn btn-default get"><a href="<?= $slide->button ?>" class="carousel-link" aria-label="">Посмотреть</a></button>
                     </div>
                     <div class="col-sm-6">
                     	<img class="girl img-responsive lazy" src="/images/home/Eclipse-4.2s-200px.svg" data-original="<?= $img?>" alt="<?= $slide->title?>">

                     </div>
                  </div>
                  <?php endforeach;?>
               </div>
               <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev" aria-label="">
               <i class="fa fa-angle-left"></i>
               </a>
               <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next" aria-label="">
               <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
      </div>
   </div>
</section>
<!--/slider-->
<section>
   <div class="container adm">
      <div class="row">
         <div class="col-sm-3 adm-category">
            <div class="left-sidebar">
               <h2>Одежда ADM</h2>
               <ul class="catalog category-products">
                  <?= \app\components\MenuWidget::widget(['tpl' => 'menu']) ?>
               </ul>
               <!--/category-products-->
               <div class="shipping text-center">
                  <!--shipping-->
                  <h2>Новости</h2>

                  <?php if(count($model)): ?>
                  <?php foreach ($model as $item): ?>
                  <?php $img = $item->getMainimage();?>
                  <div class="well col-sm-12 on-main-news">
                     <a href="<?= \yii\helpers\Url::to(['post/show', 'id' => $item->id]) ?>" aria-label=""><?= HtmlExtend::img($img, ['alt' => $item->title, 'width'=>'100%', 'class' => 'lazy'])?></a>
                     <h3><?=$item->title?></h3>
                  </div>
                  <?php endforeach ?>
                  <?php endif?>
               </div>
               <!--/shipping-->
            </div>
         </div>
         <div class="col-sm-9 padding-right">
            <?php if( !empty($hits) ):?>
            <div class="features_items">
               <!--features_items-->
               <h2 class="title text-center">Хиты продаж</h2>
               <?php foreach ($hits as $hit): ?>
               <?php $mainImg = $hit->getImage();?>
               <div class="col-sm-4 col-xs-6 ">
                  <div class="product-image-wrapper">
                     <div class="single-products">
                        <div class="productinfo text-center">
                           <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>" aria-label="">
							<img class="lazy" src="/images/home/Eclipse-4.2s-200px.svg" data-original="<?= $mainImg->getUrl('250x250')?>" alt="<?= $hit->name?>">
                           <?php if(!empty($hit->stock_price) ):?>
                           <h2> <?= $hit->stock_price?> ₽ <strike><?= $hit->price?> ₽</strike></h2>
                           <?php else:?>
                           <h2><?= $hit->price?> ₽</h2>
                           <?php endif?>
                           <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>" class="adm-name-product" aria-label="<?= $hit->id ?>"><?= $hit->name?></a></p>
                           <a href="#" data-id="<?= $hit->id ?>"  class="btn btn-default add-to-cart" aria-label="<?= $hit->id ?>"><img class="adm-cart-product" src="/images/home/icons8-shopping-bag-filled-50.png" alt=""></a>
                           <!-- Быстрый просмотр-->
                           <?php
                              Modal::begin([
                              'toggleButton' => [
                              'class' => 'adm-fast-view',
                              'title' => 'Быстрый просмотр',
                              'data-trigger' => 'hover',



                              ],
                                  'size' => 'modal-lg',
                                  'footer' => '<a href="'. \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) . '"  class="btn btn-adm-more" aria-label="">Подробнее</a>'

                                                  ]);
                              ?>
                           <section>
                              <div class="container adm-modal">
                                 <?php
                                    $mainImg = $hit->getImage();
                                    $gallery = $hit->getImages();
                                    ?>
                                 <div class="col-sm-12">
                                    <div class="product-details">
                                       <!--product-details-->
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
                                          <div class="product-information">
                                             <!--/product-information-->
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
            </div>
            <!--features_items-->
            <?php endif; ?>
         </div>
      </div>
   </div>
</section>