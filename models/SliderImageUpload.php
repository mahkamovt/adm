<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class SliderImageUpload extends Model
{

    public $image;

    public function rules()
    {

        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png,gif']
        ];

    }

    public function uploadFile(UploadedFile $file, $currentSliderimage)
    {

        $this->image = $file;


        if ($this->validate()) {

            $this->deletecurrentSliderimage($currentSliderimage);
            return $this->saveSliderimage();

        }


    }

    public function deletecurrentSliderimage($currentSliderimage)
    {
        if ($this->fileExists($currentSliderimage)) {
            unlink($this->getFolder() . $currentSliderimage);
        }
    }

    public function fileExists($currentSliderimage)
    {

        if (!empty($currentSliderimage) && $currentSliderimage != null) {
            return file_exists($this->getFolder() . $currentSliderimage);
        }

    }

    private function getFolder()
    {

        return Yii::getAlias('@web') . 'uploads/';
    }

    public function saveSliderimage()
    {
        $filename = $this->generateFilename();

        $this->image->saveAs($this->getFolder() . $filename);

        return $filename;
    }

    private function generateFilename()
    {

        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }

}