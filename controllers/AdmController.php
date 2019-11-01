

namespace app\controllers;

class AdmController extends AppController
{

    public $layout = 'adm';

    public function actionIndex()
    {

        return $this->render('index');

    }

    public function actionPortraits()
    {
        return $this->render('portraits');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}