<?php

/* @var $this yii\web\View */

//$this->title = 'ADM shop';
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;
use app\models\Cart;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
?>


<!--Вывод флеш собщений о успешном заказе-->
    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-lable="Close">
                <span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif; ?>

    <?php /*Хлебные крошки*/
   $this->params['breadcrumbs'][] = ['label' => $this->title];

   ?>
    <section>
        <div class="container adm">
            <div class="row">
                <div class="col-sm-12 padding-right">
                    <?php if( !empty($hits) ):?>
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Скидки на новую коллекцию</h2>
                        <?php foreach ($hits as $hit): ?>
                        <?php $mainImg = $hit->getImage();?>
                        <div class="col-sm-4 col-xs-6 product_stoke_item">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">

                      <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>">

                        <img class="lazy" src="/images/home/Eclipse-4.2s-200px.svg" data-original="<?= $mainImg->getUrl('300x300')?>" alt="<?= $hit->name?>">

                      </a>
                                            <?php if(!empty($hit->stock_price) ):?>
<h2> <?= $hit->stock_price?> ₽ <strike><?= $hit->price?> ₽</strike></h2>

 <?php else:?>
<h2><?= $hit->price?> ₽</h2>

 <?php endif?>
                                            <p class="product__title"><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>" class="adm-name-product"><?= $hit->name?></a></p>
                                            <a href="#" data-id="<?= $hit->id ?>"  class="btn btn-default add-to-cart"><img class="adm-cart-product" src="/images/home/icons8-shopping-bag-filled-50.png"></a>
                                            <a href="#" data-id="<?= $hit->id ?>"  class="btn btn-default add-to-cart add-to-cart__mobile" aria-label="<?= $hit->id ?>">В корзину</a>


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
                     <a href="#" id="loadmore_stoke" class="btn btn-default">Показать еще</a><!--features_items-->
                <?php endif; ?>

                </div>
            </div>
        </div>
    </section>

       <section>
       <div class="container adm">

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
</div>
    </section>