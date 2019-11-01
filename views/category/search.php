<?php
   /* @var $this yii\web\View */

   //$this->title = 'ADM shop | Категории';
   use yii\helpers\Html;
   use yii\widgets\LinkPager;
   use app\models\Cart;
   ?>
<?php $this->beginBlock('block2');?>
<section id="advertisement">
   <div class="container">
      <img src="/images/shop/adm-banner.jpg" alt="" />
   </div>
</section>
<?php $this->endBlock();?>
<?php /*Хлебные крошки*/
   $this->params['breadcrumbs'][] = ['label' => 'Поиск'];

   ?>
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
               <!--/category-productsr-->
               <div class="shipping text-center">
                  <!--shipping-->

               </div>
               <!--/shipping-->
            </div>
         </div>
         <div class="col-sm-9 padding-right">
            <div class="features_items">
               <!--features_items-->
               <h2 class="title text-center">Вы искали: <?= Html::encode($q) ?></h2>
               <?php if(!empty($products)):?>
               <?php foreach ($products as $product) :?>
               <?php $mainImg = $product->getImage();?>
               <div class="col-sm-4">
                  <div class="product-image-wrapper">
                     <div class="single-products">
                        <div class="productinfo text-center">
                           <?= Html::img($mainImg->getUrl('268x249'), ['alt' => $product->name])?>
                         <?php if(!empty($product->stock_price) ):?>
<h2> <?= $product->stock_price?> ₽ <strike><?= $product->price?> ₽</strike></h2>

 <?php else:?>
<h2><?= $product->price?> ₽</h2>

 <?php endif?>
                           <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>" class="adm-name-product"><?= $product->name?></a></p>
                          <a href="#" title="В корзину" data-toggle="tooltip" data-placement="left" data-id="<?= $product->id ?>" class="btn btn-default add-to-cart"><img class="adm-cart-product" src="/images/home/icons8-shopping-bag-filled-50.png"></a>
                        </div>
                        <!--<div class="product-overlay">
                           <div class="overlay-content">
                           	<h2>$<?= $product->price ?></h2>
                           	<p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>" ><?= $product->name?></a></p>
                           	<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                           </div>
                           </div>-->
                        <?php if($product->new):?>
                        <?=Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new'])?>
                        <?php endif?>
                        <?php if($product->sale):?>
                        <?=Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new'])?>
                        <?php endif?>
                     </div>
                  </div>
               </div>
               <?php endforeach;?>
               <?php
                  echo  \yii\widgets\LinkPager::widget([
                      'pagination' => $pages,
                  ]);
                  ?>
               <?php else :?>
               <h2>
                  Ничего не найдено...
               </h2>
               <?php endif;?>
            </div>
         </div>
      </div>
   </div>
</section>