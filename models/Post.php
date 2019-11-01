<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $user_id
 */
class Post extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'anons'], 'required'],
            [['description'], 'string'],
            [['user_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок новости',
            'anons' => 'Aнонс',
            'description' => 'Содержимое',
            'user_id' => 'User ID',
        ];
    }

    /*Для Изображения новости*/
    public function saveImage($filename)
    {

        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/' . $this->image : '/no=-image.png';
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete();
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->image);
    }

    /*Для Баннера*/

    public function saveBanner($filename)
    {

        $this->banner = $filename;
        return $this->save(false);
    }

    public function getBanner()
    {
        return ($this->banner) ? '/uploads/' . $this->banner : '/no=-image.png';
    }

    public function beforeDeleteBanner()
    {
        $this->deleteBanner();
        return parent::beforeDelete();
    }

    public function deleteBanner()
    {
        $imageUploadModel = new BannerUpload();
        $imageUploadModel->deleteCurrentBanner($this->banner);
    }

    /*Для изображения новости на главной*/

    public function saveMainimage($filename)
    {

        $this->mainimage = $filename;
        return $this->save(false);
    }

    public function getMainimage()
    {
        return ($this->mainimage) ? '/uploads/' . $this->mainimage : '/no=-image.png';
    }

    public function beforeDeletemainimage()
    {
        $this->deleteMainimage();
        return parent::beforeDelete();
    }

    public function deleteMainimage()
    {
        $imageUploadModel = new MainimageUpload();
        $imageUploadModel->deleteCurrentmainimage($this->mainimage);
    }
}




