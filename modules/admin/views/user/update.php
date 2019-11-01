<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */

$this->title = 'Изменить данные: ' . $model->name;
$this->params['breadcrumbs'][] = 'Редактирование профиля';
?>
<div class="container adm">
<div class="user-update">

    <h1>Обновите ваши данные</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>