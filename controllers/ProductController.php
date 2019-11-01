<?php


namespace app\controllers;
use app\models\Category;
use app\models\Product;
use app\models\ImageUpload;
use app\models\HtmlExtend;
use Yii;
use app\models\Cart;


class ProductController extends AppController {

	public function actionView($id){
	//	$id = Yii::$app->request->get('id'); - второй вариант получения id
		$session = Yii::$app->session;
		$session->open();
		$this->view->params['cartcount'] = $session['cart.qty'];
		$product = Product::findOne($id);
		
		$category = Category::findOne($id);
		 /*Вывод 404*/
	      if(empty($product))
	      throw new \yii\web\HttpException(404, 'Такой страницы не существует!');


		$product_property = array();
		/*
		** Set Action
		*/
		$product_property['is_action'] = 0;
		if ($product->new == 1 || $product->sale == 1) {
			$product_property['is_action'] = 1;
			if ($product->new == 1 ) {
				$product_property['action']['new'] = 'Новинка';
			}
			if ($product->sale == 1 ) {
				$product_property['action']['sale'] = 'Скидка';
			}
		}



		/*Вывод метатегов*/
		 $this->setMeta('ADM | ' . $product->name, $product->keywords, $product->description);


         $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();

			/*
			** Go to view
			*/


		return $this->render('view', compact('product','product_property','hits','category','session'));

 	}


}