<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 *
 * @property string $folder
 */
class MainimageUpload extends Model
{

    public $mainimage;

    public function rules()
    {

        return [
            [['mainimage'], 'required'],
            [['mainimage'], 'file', 'extensions' => 'jpg,png']
        ];

    }
    /**
     * @param UploadedFile $file
     * @param $currentMainimage
     * @return string
     */
    public function uploadFile(UploadedFile $file, $currentMainimage)
    {
        $this->mainimage = $file;


        $this->deleteCurrentMainimage($currentMainimage);
        return $this->saveMainimage();



    }

    /**
     * @param $currentMainimage
     */
    public function deleteCurrentMainimage($currentMainimage)
    {
        if ($this->fileExists($currentMainimage)) {
            unlink($this->getFolder() . $currentMainimage);
        }
    }

    /**
     * @param $currentMainimage
     * @return bool
     */
    public function fileExists($currentMainimage)
    {

        if (!empty($currentMainimage) && $currentMainimage != null) {
            return file_exists($this->getFolder() . $currentMainimage);
        }

    }

    public function getFolder()
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