<?php

namespace app\modules\admin\models;
use yii\db\ActiveRecord;
use mdm\admin\models\User;
use Yii;

/**
 * This is the model class for table "ordershop".
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $qty
 * @property double $sum
 * @property string $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 */
class Ordershop extends \yii\db\ActiveRecord
{




 public function behaviors()
            {
                return [
                    'image' => [
                        'class' => 'rico\yii2images\behaviors\ImageBehave',
                    ]
                ];
            }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordershop';
    }

    public function getOrderItems() {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'qty', 'name', 'phone'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty'], 'integer'],
            [['sum'], 'number'],
            [['status'], 'string'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ Заказа',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
            'qty' => 'Кол-во',
            'sum' => 'Сумма',
            'status' => 'Статус',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'text' => 'Комментарий к заказу',
        ];
    }
}
