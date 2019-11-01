<?php

namespace app\controllers;

use app\models\Post;
use Yii;
use yii\data\Pagination;
use app\models\HtmlExtend;


class PostController extends AppController
{

    public $layout = 'main';

    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->view->params['cartcount'] = $session['cart.qty'];
        /*Пагинация*/
        $query = Post::find()->orderBy('id DESC');
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $model = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('ADM | Новости ', 'Новости', 'Новости');
        return $this->render('index', compact('model', 'pages'));

    }

    public function actionShow($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $this->view->params['cartcount'] = $session['cart.qty'];

        /*Вывод метатегов*/

        $model = Post::findOne($id);
        $this->setMeta('ADM | ' . $model->title, $model->title, $model->title);
        return $this->render('show', compact('model'));

    }

}