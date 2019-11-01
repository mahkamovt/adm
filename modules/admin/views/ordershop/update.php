<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Ordershop */

$this->title = 'Изменить заказ №: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Заказ № ' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="ordershop-update">

    <h1>Редактирование заказа №<?= $model->id?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
