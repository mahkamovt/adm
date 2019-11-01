<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\db\ActiveRecord;
?>

<?php /*Хлебные крошки*/

$this->params['breadcrumbs'][] = ['label' => 'Оформление заказа'];

?>
<div class="container adm">
	<!--Вывод флеш собщений о успешном заказе-->
	<?php if( Yii::$app->session->hasFlash('success') ): ?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-lable="Close">
				<span aria-hidden="true">&times;</span></button>
				<?php echo Yii::$app->session->getFlash('success'); ?>
			</div>
		<?php endif; ?>
<!--Вывод флеш ошибки при заказе-->
	<?php if( Yii::$app->session->hasFlash('error') ): ?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-lable="Close">
				<span aria-hidden="true">&times;</span></button>
				<?php echo Yii::$app->session->getFlash('error'); ?>
			</div>
		<?php endif; ?>



<?php if (!empty($session['cart'])): ?>
<div class="table-responsive">
  <table class="table table-hover">
  	<thead>
  		<tr>
			<th>Фото</th>
			<th>Наименование</th>
			<th>Кол-во</th>
			<th>Размер</th>
			<th>Цена</th>
			<th>Cумма</th>
  		</tr>
  	</thead>
  	<tboby>
	<?php foreach($session['cart'] as $id => $item):?>
	<tr>
		<td><?= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 100])?></td>
		<td><a href="<?= Url::to(['product/view', 'id' =>  $id])?>"><?= $item['name']?></a></td>
		<td><?= $item['qty']?></td>
		<td><?= $item['size']?></td>
		<td><?= $item['price']?></td>
		<td><?= $item['qty'] * $item['price'] ?></td>
	</tr>
	<?php endforeach;?>
	<tr>
		<td colspan="5">Итого</td>
		<td><?= $session['cart.qty']?></td>
	<tr>
		<td colspan="5">Cумма</td>
		<td><?= $session['cart.sum']?></td>
	</tr>
	</tr>
  	</tboby>
  </table>
</div>
<hr/>

<?php $form = ActiveForm::begin() ?>

<?= $form->field($order, 'name')?>
<?= $form->field($order, 'email')?>

<?= $form->field($order, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '+7 (999)-999-99-99',
]) ?>
<?= $form->field($order, 'address')?>
<?= $form->field($order, 'text')->textarea(['rows' => '10'])?>
<?= Html::submitButton('Заказать', ['class' => 'btn btn-success'])?>

<?php $form = ActiveForm::end() ?>

<?php else: ?>
		 <h3>Корзина пуста!</h3>
<?php endif; ?>

</div>