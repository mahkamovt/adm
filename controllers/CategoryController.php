<?php


namespace app\controllers;
use app\models\Category;
use app\models\Product;
use app\modules\admin\models\Slider;
use app\models\Post;
use app\models\HtmlExtend;
use Yii;
use yii\data\Pagination;
use yii\web\HttpException;

class CategoryController extends AppController {

    public function actionIndex(){
        $session = Yii::$app->session;
        $session->open();
        $this->view->params['cartcount'] = $session['cart.qty'];
        /*Вывод метатегов на главной*/
        $this->setMeta('ADM — Streetwear', '2', '3');

        $hits = Product::find()->where(['hit' => '1'])->orderBy('id DESC')->limit(6)->all();
        $categoryHits = Category::find()->orderBy('id DESC')->limit(3)->all();
        $slides = Slider::find()->orderBy('id DESC')->limit(5)->all();
        //debug($slides);
        // debug($hits);

        /*Пагинация*/
        $query = Post::find()->orderBy('id DESC');
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 1, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $model = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', compact('hits','session','pages','model','slides','categoryHits'));
    }


    public function actionStock(){
        $session = Yii::$app->session;
        $session->open();
        $this->view->params['cartcount'] = $session['cart.qty'];
        /*Вывод метатегов на главной*/
        $this->setMeta('ADM - акционные товары');
        $hits = Product::find()->where(['hit' => '1'])->limit(9)->all();
        // debug($hits);

        /*Пагинация*/
        $query = Post::find()->orderBy('id DESC');
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $model = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('stock', compact('hits','session','pages','model'));
    }

    public function actionView($id){

        $id = Yii::$app->request->get('id'); //- второй вариант получения id
        $session = Yii::$app->session;
        $session->open();
        $this->view->params['cartcount'] = $session['cart.qty'];
        $categoryHits = Category::find()->orderBy('RAND()')->limit(3)->all();
        $category = Category::find()->where(['id' => $id])->with('parent')->one();
        //debug($category);
        //$category = Category::findOne($id);


        /*Вывод 404*/
        if(empty($category))
            throw new \yii\web\HttpException(404, 'Такой страницы не существует!');



        /*Пагинация*/
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        /*Вывод метатегов*/
        $this->setMeta('ADM | ' . $category->name, $category->keywords, $category->description);

        /*
    ** Go to view
    */

        return $this->render('view', compact('products','pages', 'category','session','categoryHits' ));
    }

//Реализация поиска



    public function actionSearch(){
        $session = Yii::$app->session;
        $session->open();
        $this->view->params['cartcount'] = $session['cart.qty'];
        $q = Yii::$app->request->get('q');
        $this->setMeta('ADM | Поиск ' . $q);
        if(!$q)
            return $this->render('search');
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        /*Вывод метатегов*/
        return $this->render('search', compact('products', 'pages', 'q','session'));
    }


}