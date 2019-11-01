<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "slider".
 *
 * @property string $image
 * @property string $title
 * @property string $description
 * @property string $button
 */
class Slider extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'button'], 'required'],
            [['image', 'description'], 'string', 'max' => 999],
            [['title', 'button'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'image' => 'Изображение',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'button' => 'Ссылка на кнопке',
        ];
    }


    /*Для Изображения новости*/
    public function saveSliderimage($filename)
    {

        $this->image = $filename;
        return $this->save(false);
    }

    public function getSliderimage()
    {
        return ($this->image) ? '/uploads/' . $this->image : '/no=-image.png';
    }

    public function beforeDelete()
    {
        $this->deleteSliderimage();
        return parent::beforeDelete();
    }

    public function deleteSliderimage()
    {
        $imageUploadModel = new SliderImageUpload();
        $imageUploadModel->deleteCurrentSliderimage($this->image);
    }
}
