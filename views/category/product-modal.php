<section>
		<div class="container adm-modal">
		<?php
			$mainImg = $product->getImage();
			$gallery = $product->getImages();
			?>
				<div class="col-sm-12">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-6">
							<div class="view-product">
					 <?=Html::img($mainImg->getUrl(), ['alt' => $product->name])?>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="product-information"><!--/product-information-->
	  <?php if($product->new):?>
                    <?=Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'newarrival'])?>
                <?php endif?>

                <?php if($product->sale):?>
                    <?=Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'newarrival'])?>
                <?php endif?>

					<div class="adm-name-modal"><?= $product->name?></div>

<span class="adm-span">
		<span><?= $product->price ?>  руб.</span>
			<input type="text" value="1" id="qty" />
									 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'admform', 'class' => 'adm-form-product']]); ?>
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

		<a href="#" data-id="<?= $product->id ?>" class="btn btn-fefault add-to-cart cart">
		<img class="adm-cart-product" src="/images/home/icons8-shopping-bag-filled-50.png">
				</a>

</span>

		<div class="adm-modal-content-product"><?= $product->content?></div>

				</div>

			</div>
		</div>
	</div>
</div>
				</section>