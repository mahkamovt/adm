<?php


namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;


class Category extends ActiveRecord
{


    public static function tableName()
    {

        return 'category';

    }
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function getProduct()
    {

        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }


    public function getParent()
    {

        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

}


