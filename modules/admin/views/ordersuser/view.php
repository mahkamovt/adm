<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Product;
use app\modules\admin\models\OrderShop;
use app\modules\admin\models\OrderItems;
use yii\behaviors\TimestampBehavior;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Ordershop */
$this->title = $model->name;
//$this->title = 'Список товаров';
$this->params['breadcrumbs'][] = ['label' => 'Мои заказы', 'url' => ['../account']];
$this->params['breadcrumbs'][] = 'Товары';
\yii\web\YiiAsset::register($this);
?>

<div class="container adm">
<div class="ordershop-view">

   <h1><a href="/account">
      <img class="back-account" src="/images/home/icons8-login-rounded-50.png"></a> Список товаров</h1>

    <?php if ($userProducts):?>

    <?php foreach($userProducts as $item):
        ?>

        <div class="zakazi-items col-sm-4 col-xs-12" >
<div class="col-sm-12 col-xs-12 order-string">
  <?= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 200])?>
</div>
<div class="col-sm-12 col-xs-12 order-string">
  <a href="<?= \yii\helpers\Url::to(['/product/view', 'id' =>  $item->product_id])?>">
        <?= $item['name']?></a>
</div>
<div class="col-sm-12 col-xs-12 order-string">
 Кол-во: <?= $item['qty_item']?>
</div>
<div class="col-sm-12 col-xs-12 order-string">
  Размер: <?= $item['size']?>
</div>
<div class="col-sm-12 col-xs-12 order-string">
  Цена:<?= $item['price'] ?> руб.
</div>
<div class="col-sm-12 col-xs-12 order-string">
 Сумма:<?= $item['sum_item'] ?> руб.
</div>
</div>

    <?php endforeach;?>

    <?php else:?>


        <p>У вас еще нет заказов</p>

<?php endif;?>

</div>
</div>