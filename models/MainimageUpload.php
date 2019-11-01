<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class mainimageUpload extends Model
{

    public $mainimage;

    public function rules()
    {

        return [
            [['mainimage'], 'required'],
            [['mainimage'], 'file', 'extensions' => 'jpg,png']
        ];

    }

    public function uploadFile(UploadedFile $file, $currentMainimage)
    {

        $this->mainimage = $file;


        if ($this->validate()) {

            $this->deletecurrenMainimage($currentMainimage);
            return $this->saveMainimage();

        }


    }

    public function deletecurrenMainimage($currentMainimage)
    {
        if ($this->fileExists($currentMainimage)) {
            unlink($this->getFolder() . $currentMainimage);
        }
    }

    public function fileExists($currentMainimage)
    {

        if (!empty($currentMainimage) && $currentMainimage != null) {
            return file_exists($this->getFolder() . $currentMainimage);
        }

    }

    private function getFolder()
    {

        return Yii::getAlias('@web') . 'uploads/';
    }

    public function saveMainimage()
    {
        $filename = $this->generateFilename();

        $this->mainimage->saveAs($this->getFolder() . $filename);

        return $filename;
    }

    private function generateFilename()
    {

        return strtolower(md5(uniqid($this->mainimage->baseName)) . '.' . $this->mainimage->extension);
    }

}