<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Ordershop */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Заказ №'. $model->id;
?>
<div class="ordershop-view">

    <h1>Заказ №<?= $model->id?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Уверены, что хотите удалить этот объект',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',

            [
                'attribute' => 'status',
                'value' => !$model->status ? '<span class="text-danger">Активен</span>' :
                    '<span class="text-success">Завершен</span>',
                'format' => 'raw',/*Чтобы распознавался HTML*/
            ],

            'name',
            'email:email',
            'phone',
            'address',
            'text',
        ],
    ]) ?>


<?php $items = $model->orderItems;?>

<div class="table-responsive">
    <h2>Список товаров</h2>
  <table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Наименование</th>
            <th>Кол-во</th>
            <th>Размер</th>
            <th>Цена</th>
            <th>Cумма</th>
        </tr>
    </thead>
    <tboby>
    <?php foreach($items as $item):?>
    <tr>
        <td><a href="<?= \yii\helpers\Url::to(['/product/view', 'id' =>  $item->product_id])?>">
        <?= $item['name']?></a></td>
        <td><?= $item['qty_item']?></td>
        <td><?= $item['size']?></td>
        <td><?= $item['price']?></td>
        <td><?= $item['sum_item'] ?></td>
    </tr>
    <?php endforeach;?>

    </tboby>
  </table>
</div>

</div>
