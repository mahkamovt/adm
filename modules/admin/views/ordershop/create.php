<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Ordershop */

$this->title = 'Create Ordershop';
$this->params['breadcrumbs'][] = ['label' => 'Ordershops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordershop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
