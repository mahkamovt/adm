<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\User;
use yii\web\HttpException;

class SiteController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()

    {



 $session = Yii::$app->session;
    $session->open();
    $this->view->params['cartcount'] = $session['cart.qty'];
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }



public function actionSignup(){
$session = Yii::$app->session;
$session->open();
$this->view->params['cartcount'] = $session['cart.qty'];

 if (!Yii::$app->user->isGuest) {
 return $this->goHome();
 }

 $model = new SignupForm();
 if($model->load(\Yii::$app->request->post()) && $model->validate()){
    $user = new User();
    $user->username = $model->username;
    $user->email = $model->email;
    $user->status = 0;
    $user->password = \Yii::$app->security->generatePasswordHash($model->password);
     if($user->save()){
            return $this->goHome();
        }

}

 return $this->render('signup', compact('model'));
}


public function actionError()
{
    $exception = Yii::$app->errorHandler->exception;
    if ($exception !== null) {
        return $this->render('error', ['exception' => $exception]);
    }
}
}
