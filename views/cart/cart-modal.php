<?php if (!empty($session['cart'])): ?>
<div class="table-responsive">
  <table class="table table-hover">
  	<thead>
  		<tr>
			<th class="cart-th" colspan="2">Фото</th>
			<th class="cart-th">Наименование</th>
			<th class="cart-th">Кол-во</th>
			<th class="cart-th">Размер</th>
			<th class="cart-th">Цена</th>
			<th class="cart-th"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
  		</tr>
  	</thead>
  	<tboby>
	<?php foreach($session['cart'] as $id => $item):?>

	<tr>
		<td colspan="2"><?= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 100])?></td>
		<td><?= $item['name']?></td>
		<td><?= $item['qty']?></td>
		<td><?= $item['size']?></td>
		<td><?= $item['price']?></td>
		<td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger delete-item" aria-hidden="true"></span></td>
	</tr>
	<?php endforeach;?>
	<tr>
		<td colspan="6">Итого</td>
		<td><?= $session['cart.qty']?></td>
	<tr>
		<td colspan="6">Cумма</td>
		<td><?= $session['cart.sum']?></td>
	</tr>
	</tr>
  	</tboby>
  </table>
</div>

<?php else: ?>
		 <h3>Корзина пуста!</h3>
<?php endif; ?>