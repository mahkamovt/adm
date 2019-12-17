
<?php

/* @var $this yii\web\View */

//$this->title = 'ADM shop | Категории';
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Modal;
use app\models\Cart;
use yii\widgets\ActiveForm;
?>



<?php $this->beginBlock('block2');?>


<section id="advertisement">
		<div class="container">
			<img src="/images/shop/adm-banner.jpg" alt="" />
		</div>
	</section>

<?php $this->endBlock();?>

<?php /*Хлебные крошки*/

if ($category->parent_id == 0){
}
else{

$this->params['breadcrumbs'][] = ['label' => $category->parent->name, 'url' => $category->parent_id];

}
$this->params['breadcrumbs'][] = ['label' => $category->name,];

?>

	<section>
		<div class="container adm">
			<div class="row">
				<div class="col-sm-3 adm-category">
					<div class="left-sidebar">
						<h2>Категории</h2>
							<ul class="catalog category-products">
						<?= \app\components\MenuWidget::widget(['tpl' => 'menu']) ?>
						</ul><!--/category-products-->
						<!--/category-productsr-->
						<div class="shipping text-center"><!--shipping-->





                        <img src="images/home/shipping.jpg" alt="" />





                        </div><!--/shipping-->

					</div>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?= $category->name ?></h2>




					<?php if(!empty($products)):?>
						<?php foreach ($products as $product) :?>
						<?php $mainImg = $product->getImage();?>



						<div class="col-sm-4 col-xs-6 ">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">

									<a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>">




										<img class="lazy" src="/images/home/Eclipse-4.2s-200px.svg" data-original="<?= $mainImg->getUrl('250x250')?>" alt="<?= $product->name?>">
										</a>
										<?php if(!empty($product->stock_price) ):?>
<h2> <?= $product->stock_price?> ₽ <strike><?= $product->price?> ₽</strike></h2>

 <?php else:?>
<h2><?= $product->price?> ₽</h2>

 <?php endif?>
		<p class="product__title"><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>" class="adm-name-product"><?= $product->name?></a></p>
										<a href="#" title="В корзину" data-toggle="tooltip" data-placement="left" data-id="<?= $product->id ?>" class="btn btn-default add-to-cart"><img class="adm-cart-product" src="/images/home/icons8-shopping-bag-filled-50.png"></a>



<!-- Быстрый просмотр и покупка-->
<?php
			Modal::begin([
			'toggleButton' => [
			'class' => 'adm-fast-view',
			'title' => 'Быстрый просмотр',

		],
				'size' => 'modal-lg',
				'footer' => '<a href="'. \yii\helpers\Url::to(['product/view', 'id' => $product->id]) . '"  class="btn btn-adm-more">Подробнее</a>'

								]);
?>

<section>

		<?php
			$mainImg = $product->getImage();
			$gallery = $product->getImages();
			?>
				<div class="col-sm-12">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-6">
							<div class="view-product">
								  <?php if($product->new):?>
                    <?=Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'newarrival'])?>
                <?php endif?>

                <?php if($product->sale):?>
                    <?=Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'newarrival'])?>
                <?php endif?>
					 <?=Html::img($mainImg->getUrl(), ['alt' => $product->name])?>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="product-information"><!--/product-information-->


					<div class="adm-name-modal"><?= $product->name?></div>

<span class="adm-span">
		<span class="adm-price"><?= $product->price ?>  руб.</span>
</span>

		<div class="adm-modal-content-product"><p><?= $product->content?></p></div>

				</div>

			</div>
		</div>
	</div>

				</section>



		<?php Modal::end();?>


					</div>
					<a href="#" data-id="<?= $product->id ?>"  class="btn btn-default add-to-cart add-to-cart__mobile" aria-label="<?= $product->id ?>">В корзину</a>
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
							<div style="clear:both"></div>
						<?php
							echo  \yii\widgets\LinkPager::widget([
							    'pagination' => $pages,
							]);
						?>
						<?php else :?>
							<h2>
								К сожалению товаров нет
							</h2>
					<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="categoryHitOnMain">

    <div class="container">
      <div class="row">
      <div class="col-sm-12">
      	<h2>Похожие категории</h2>
      <?php foreach ($categoryHits as $categoryHit) :?>
      <?php $categoryImg = $categoryHit->getImage();?>
         <div class="col-sm-4 category_hits">
            <p class="category_hits_title">
               <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $categoryHit['id']])?>" target="_blank"><?= $categoryHit->name?>
            </p>
              <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $categoryHit['id']])?>" target="_blank">  <?= Html::img($categoryImg->getUrl('250x250'), ['alt' => $categoryHit->name])?></a>
         </div>
    <?php endforeach;?>

</div>
</div>
</div>
</section>