
<li>
	<a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']])?>" tab-index="<?= $category['id']?>">
		<?= $category['name'] ?>
	</a>
	<?php if( isset($category['childs'])): ?>
<div class="dark-background-menu">
</div>
<div class="sub-category-top-menu-background">
		<ul class="sub-category-top-menu" sub-index="<?= $category['id']?>">
			<?= $this->getMenuHtml($category['childs'])?>
		</ul>
</div>
	<?php endif;?>
</li>






