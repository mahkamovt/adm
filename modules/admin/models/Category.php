<?php

namespace app\modules\admin\models;
use yii\behaviors\TimestampBehavior;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $keywords
 * @property string $description
 */
class Category extends \yii\db\ActiveRecord
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
        return 'category';
    }


 public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'name'], 'required'],
            [['parent_id'], 'integer'],
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
            'id' => '№ категории',
            'parent_id' => 'Родительская категория',
            'name' => 'Название категории',
            'keywords' => 'Ключевые слова',
            'description' => 'Мета-описание',
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
