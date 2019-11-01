<?php

namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use app\models\Ordershop;
use app\models\OrderItems;
use yii\web\Controller;
use Yii;

class AppController extends Controller {


		public function debug($arr){

		echo '<pre>'.print_r($arr, true).'</pre>';
		}


	protected function setMeta($title = null, $keywords = null, $description = null) {

		$this->view->title = $title;
		$this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
		$this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
	}

}

