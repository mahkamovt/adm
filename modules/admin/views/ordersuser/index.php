<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мои заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container adm adm-user">
<div class="row main-block-user" >

<div class="col-xs-12 col-sm-6 hello-user">
<?php

$firstName = Yii::$app->user->identity['name'];
$firstName = preg_split('//u',$firstName,-1,PREG_SPLIT_NO_EMPTY);

$secondName = Yii::$app->user->identity['lastname'];
$secondName = preg_split('//u',$secondName,-1,PREG_SPLIT_NO_EMPTY);



?>
   <div class="intro-left"><span class="intro-left-under"> <span class="intro"><?=$firstName[0]?><?=$secondName[0]?></span></span></div>
   <div class="intro-right"> <span>Здравстуйте,</span><br/><span class="personal-name"><?=Yii::$app->user->identity['name']?> <?=Yii::$app->user->identity['lastname']?></span></div>
<div class="col-xs-12 col-sm-6 ordershop-index mob" >
    <a href="<?= \yii\helpers\Url::to('/change-password') ?>" class="btn btn-login"><button type="submit" class="btn btn-login" name="change-button">Сменить пароль</button></a></br>
<a href="<?= \yii\helpers\Url::to(['/admin/user/update', 'id' =>  Yii::$app->user->identity['id']]) ?>" class="btn btn-login"><button type="submit" class="btn btn-login" name="change-button">Редактировать профиль</button></a>
</div>
</div>

<div class="col-xs-12 col-sm-6 hello-user-h1">
<h1>Ваши заказы</h1>

<?php if ($ordersUser):?>
    <?php foreach($ordersUser as $item):?>

<div class="zakazi">
<div class="col-sm-6 col-xs-6 order-string">
  <span class="number-order">ЗАКАЗ №:</span></br><span class="value-number-order"> <?= $item['id']?></span>
</div>
<div class="col-sm-6 col-xs-6 order-string">
 <span class="data-order"> Дата заказа:</span></br><span class="value-data-order"> <?= $item['created_at']?>
</span>
</div>
<div class="col-sm-6 col-xs-6 order-string">
 <span class="qty-order">Кол-во: </span></br><span class="value-qty-order"><?= $item['qty'] ?> шт.</span>
</div>
<div class="col-sm-6 col-xs-6 order-string">
<span class="price-order">Сумма:</span></br><span class="value-price-order"> <?= $item['sum'] ?> руб.</span>
</div>
<div class="col-sm-6 col-xs-6 order-string">
Cтатус: <?php
        if($item['status'] == 1 ){
         echo '<span class="text-success status-message">Отправлено!</span>';
          } else {
         echo '<span class="text-danger status-message">В процессе...</span>';
        }

        ?>
</div>
<div class="col-sm-12 col-xs-12 order-string">
<a href="<?= \yii\helpers\Url::to(['/admin/ordersuser/view', 'id' =>  $item->id])?>"><button type="submit" class="btn btn-login" name="change-button">Посмотреть</button></a>
</div>

</div>

    <?php endforeach;?>

</div>






    <?php else:?>


        <p>У вас еще нет заказов</p>




<?php endif;?>

<div class="col-xs-12 col-sm-6 ordershop-index" >
    <a href="<?= \yii\helpers\Url::to('/change-password') ?>" class="btn btn-login"><button type="submit" class="btn btn-login" name="change-button">Сменить пароль</button></a></br>
<a href="<?= \yii\helpers\Url::to(['/admin/user/update', 'id' =>  Yii::$app->user->identity['id']]) ?>" class="btn btn-login"><button type="submit" class="btn btn-login" name="change-button">Редактировать профиль</button></a>
</div>
</div>


</div>
<footer>
<div class="row akc-group">
<div class="container">
<div class="groupblock">
   <div class="block1 block-img"><img src="/images/user/akc1.jpg" alt=""></div>
   <div class="block2 block-img"><img src="/images/user/akc2.jpg" alt=""></div>
   <div class="block3 block-img"><img src="/images/user/akc3.jpg" alt=""></div>
</div>
</div>
</div>
</footer>