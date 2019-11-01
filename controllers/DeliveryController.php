<?php

namespace app\controllers;
use app\models\Cart;
use Yii;

class DeliveryController extends AppController {

public function actionIndex($id = null)
{
	$session = Yii::$app->session;
    $session->open();
    $this->view->params['cartcount'] = $session['cart.qty'];
    return $this->render('index', compact('session'));

    }


public function actionBlogPost() {
//экшен состоящий из двух слов BlogPost = blog-post
	return 'Blog Post';
}



}