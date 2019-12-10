<?php
   /* @var $this yii\web\View */

   //$this->title = 'ADM shop';
   use yii\helpers\Html;
   use yii\widgets\Breadcrumbs;
   use app\models\Cart;
   use yii\widgets\ActiveForm;
   use kartik\bs4dropdown\Dropdown;
   use kartik\bs4dropdown\ButtonDropdown;
   ?>
<?php

   $this->params['breadcrumbs'][] = ['label' => $product->category->name, 'url' => '/category/' . $product->category_id];
   $this->params['breadcrumbs'][] = ['label' => $product->name];

   ?>
<section>
   <div class="container adm">
      <div class="row">

<!-- Изображение товара декстоп-->
         <?php

            $mainImg = $product->getImage();
            $gallery = $product->getImages();

            ?>
         <div class="col-sm-12 mob-padding">
            <div class="product-details">
               <!--product-details-->
               <div class="col-sm-7 mob-slider-product">
                  <?php if($product->new):?>
                  <?=Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'newarrival'])?>
                  <?php endif?>
                  <?php if($product->sale):?>
                  <?=Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'newarrival'])?>
                  <?php endif?>

                  <div class="main-gallery-adm">
                     <div class="view-product zoom" id="adm-img">


                        <img class="lazy" src="/images/home/Eclipse-4.2s-200px.svg" data-original="<?= $mainImg['url']?>" alt="<?= $product->name?>">
                     </div>
                     <div id="similar-product" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                           <?php $count = count($gallery); $i = 0; foreach($gallery as $img): ?>
                           <?php if($i % 3 == 0):?>
                           <div class="mega-gallery item <?php if($i == 0) echo ' active'?>">
                              <?php endif;?>
                              <a href="">
                                    <img class="lazy" src="/images/home/Eclipse-0.7s-84px.svg" data-original="<?= $img->getUrl('84x85')?>" alt="">
                                 </a>
                              <?php $i++; if($i % 3 == 0 || $i == $count):?>
                           </div>
                           <?php endif;?>
                           <?php endforeach;?>
                            <!--<a class="left item-control" href="#similar-product" data-slide="prev">
                     <i class="fa fa-angle-left"></i>
                     </a>
                     <a class="right item-control" href="#similar-product" data-slide="next">
                     <i class="fa fa-angle-right"></i>
                     </a>-->
                        </div>
                     </div>

                  </div>
<!-- /Изображение товара декстоп-->

<!-- Изображение товара мобилка-->

                  <div class="col-sm-12 mob-slider-product">
                     <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators car-ind-pos">
                           <?php  foreach($gallery as $key => $img): ?>
                           <li data-target="#slider-carousel" data-slide-to="<?php echo $key;?>" class="mob-carusel-nav<?php if($key == 0) echo ' active'?>"></li>
                           <?php endforeach;?>
                        </ol>
                        <div class="carousel-inner">
                            <?if( \Yii::$app->devicedetect->isiOS() ){?>
                                 <a id="ios-back" onclick="javascript:history.back(); return false;" сlass=""> <img сlass="ios-back" src="/images/home/icons8-long-arrow-left-50.png" alt=""></a>
                                 <?} else {?>
                             <?}?>
                           <?php foreach($gallery as $key => $img): ?>
                           <div class="item <?php if($key == 0) echo ' active'?>">
                              <img class="lazy" src="/images/home/Eclipse-4.2s-200px.svg" data-original="<?= $img->getUrl('')?>" alt="">
                           </div>
                           <?php endforeach;?>
                        </div>
                     </div>
                  </div>
<!-- /Изображение товара мобилка-->
               </div>
               <div class="col-sm-5">
                  <div class="product-information">
                     <!--/product-information-->
                     <h1 class="adm-h1"><?= $product->name?></h1>
                     <span class="adm-product-info">
                        <span class="price price-adm-mob"><?= $product->price ?>  руб.</span>
                        <!-- Колличество <input type="text" value="1" id="qty" />-->
                         <?php
                        if($product_property['is_action']){
                            echo '<p><b>Статус: </b>';
                            foreach ($product_property['action'] as $key => $value) {
                                echo $value;
                            }
                        }
                        ?>
                     </p>
                     <p><b>Категория:</b> <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->id])?>" class="adm-category"><?= $product->category->name?></a></p>
                        <span class="size-lable">Размер:</span><?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'admform', 'class' => 'adm-form-product']]); ?>
                        <?php $items = [
                           'S' => 'S',
                           'M' => 'M',
                           'XL'=> 'XL'
                           ];


                           $params = [

                           'id' => 'size',
                           'class' => 'adm-select'
                           ];

                           echo $form->field($product, 'size')->dropDownList($items,$params);

                           ?>
                        <?php ActiveForm::end(); ?>
                        <a href="#" data-id="<?= $product->id ?>" class="btn btn-success add-to-cart cart cart-mob-btn">
                        Добавить в корзину
                        </a>
                     </span>

                  </div>
                  <!--/product-information-->
               </div>
            </div>
            <!--/product-details-->
            <div class="category-tab shop-details-tab">
               <!--category-tab-->
               <div class="col-sm-12">
                  <ul class="nav nav-tabs">
                     <li class="active"><a href="#details" data-toggle="tab">Описание</a></li>
                     <li><a href="#companyprofile" data-toggle="tab">Доставка</a></li>
                  </ul>
               </div>
               <div class="tab-content">
                  <div class="tab-pane fade active in" id="details" >
                     <?= $product->content?>
                  </div>
                  <div class="tab-pane fade" id="companyprofile" >
                     <p>ADM доставляет заказы по Москве, Московской области и в большинство городов России</p>
                     <p>В пределах Москвы и Московской Области для Вас доступны услуги примерки и частичного выкупа товаров из заказа.</p>
                     <p>Для большинства товаров, представленных на сайте, оформляя заказ с адресом доставки в пределах Москвы и Московской Области, Вы можете выбрать удобный для Вас способ доставки и оплаты.</p>
                  </div>
               </div>
            </div>
   </div>
   </div>
   </div>
</section>
