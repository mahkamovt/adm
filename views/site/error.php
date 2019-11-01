<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Ошибка - 404';
?>
<?php /*Хлебные крошки*/

$this->params['breadcrumbs'][] = ['label' => '404'];

?>
<div class="site-error container adm">

    <h1 class="adm-404"><?php /* Html::encode($this->title) */?> 404 error</h1>
<div class="adm-404">
    <img src="/images/home/7VE.gif" alt="" /></div>
  <!--  <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
-->


</div>
