<?php

namespace app\modules\admin\models;
use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property double $stock_price
 * @property string $keywords
 * @property string $description
 * @property string $hit
 * @property string $new
 * @property string $sale
 * @property string $img
 */
class Product extends \yii\db\ActiveRecord
{


        public $image;
        public $gallery;



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
        return 'product';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }




    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'price'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale', 'lkimg'], 'string'],
            [['price'], 'number'],
            [['stock_price'], 'number'],
            [['size'], 'required'],
            [['name', 'keywords', 'description'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file','extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'image' => 'Фото (заполнять после того, как залил изображения в галерею)',
            'gallery' => 'Дополнительные изображения',
            'lkimg' => 'Изображение для личного кабинета',
            'id' => 'ID товара',
            'category_id' => 'Категория',
            'name' => 'Название',
            'content' => 'Описание',
            'size' => 'Размер',
            'price' => 'Цена',
            'stock_price' => 'Акционная цена',
            'keywords' => 'Ключевые слова',
            'description' => 'Мета-описание',
            'hit' => 'Хит',
            'new' => 'Новинка',
            'sale' => 'Распродажа',

        ];
    }


    public function upload() {
        if($this->validate()) {
            $path = 'images/store/' .$this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;

        }else{
            return false;
        }
    }



    public function uploadGallery() {
        if($this->validate()) {
            foreach ($this->gallery as $file) {
        $path = 'images/store/' .$file->baseName . '.' . $file->extension;
        $file->saveAs($path);
        $this->attachImage($path);
        @unlink($path);
            }
            return true;
        }else{
            return false;
        }
    }




}


