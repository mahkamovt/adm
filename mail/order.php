
<div class="table-responsive">
  <table class="table table-hover table-striped">
  	<thead>
  		<tr>
			<th>Наименование</th>
			<th>Кол-во</th>
			<th>Цена</th>
			<th>Сумма</th>
  		</tr>
  	</thead>
  	<tboby>
	<?php foreach($session['cart'] as $id => $item):?>
	<tr>
		<td><?= $item['name']?></td>
		<td><?= $item['qty']?></td>
		<td><?= $item['price']?> руб.</td>
		<td><?= $item['qty'] * $item['price'] ?> руб.</td>

	</tr>
	<?php endforeach;?>
	<tr>
		<td colspan="3">Итого</td>
		<td><?= $session['cart.qty']?> руб.</td>
	<tr>
		<td colspan="3">Cумма</td>
		<td><?= $session['cart.sum']?> руб.</td>
	</tr>
	</tr>
  	</tboby>
  </table>
</div>
