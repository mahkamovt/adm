<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "order_items".
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property string $name
 * @property double $price
 * @property int $qty_item
 * @property double $sum_item
 */
class OrderItems extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_items';
    }


    public function getOrderShop()
    {
        return $this->hasOne(OrderShop::className(), ['id' => 'order_id']);
    }

    /**
     * Валидация данных
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'name', 'price', 'qty_item', 'sum_item', 'size'], 'required'],
            [['order_id', 'product_id', 'qty_item'], 'integer'],
            [['price', 'sum_item'], 'number'],
            [['name', 'img'], 'string', 'max' => 400],
        ];
    }


}
