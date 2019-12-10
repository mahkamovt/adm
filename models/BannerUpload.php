<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 *
 * @property string $folder
 */
class BannerUpload extends Model
{

    public $banner;

    public function rules()
    {

        return [
            [['banner'], 'required'],
            [['banner'], 'file', 'extensions' => 'jpg,png']
        ];

    }
    /**
     * @param UploadedFile $file
     * @param $currentBanner
     * @return string
     */
    public function uploadFile(UploadedFile $file, $currentBanner)
    {
        $this->banner = $file;


            $this->deleteCurrentBanner($currentBanner);
            return $this->saveBanner();



    }

    /**
     * @param $currentBanner
     */
    public function deleteCurrentbanner($currentBanner)
    {
        if ($this->fileExists($currentBanner)) {
            unlink($this->getFolder() . $currentBanner);
        }
    }

    /**
     * @param $currentBanner
     * @return bool
     */
    public function fileExists($currentBanner)
    {

        if (!empty($currentBanner) && $currentBanner != null) {
            return file_exists($this->getFolder() . $currentBanner);
        }

    }

    private function getFolder()
    {

        return Yii::getAlias('@web') . 'uploads/';
    }

    public function saveBanner()
    {
        $filename = $this->generateFilename();

        $this->banner->saveAs($this->getFolder() . $filename);

        return $filename;
    }

    private function generateFilename()
    {

        return strtolower(md5(uniqid($this->banner->baseName)) . '.' . $this->banner->extension);
    }

}