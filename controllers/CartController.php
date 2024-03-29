<?php


namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use app\models\Ordershop;
use app\models\OrderItems;
use Yii;



class CartController extends AppController{


public function actionAdd() {

     $id = Yii::$app->request->get('id');
     $size = Yii::$app->request->get('size');
     $qty = (int)Yii::$app->request->get('qty');
     $qty = !$qty ? 1 : $qty;
     $size = !$size ? 'S' : $size;
     $product = Product::findOne($id);
     if(empty($product)) return false;
     $session = Yii::$app->session;
     $session->open();
     $cart = new Cart();
     $cart->addToCart($product, $qty, $size);
     if( !Yii::$app->request->isAjax) {
     	return $this->redirect(Yii::$app->request->referrer);
     }
     $this->layout = false;
	return $this->render('cart-modal', compact('session'));
}



 public function actionClear() {
	 $session = Yii::$app->session;
	 $session->open();
	 $session->remove('cart');
	 $session->remove('cart.qty');
	 $session->remove('cart.sum');
	 $this->layout = false;
	 return $this->render('cart-modal', compact('session'));
 }




 public function actionDeleteItem(){
	 $id = Yii::$app->request->get('id');
	 $session = Yii::$app->session;
	 $session->open();
	 $cart = new Cart();
	 $cart->recalc($id);
	 $this->layout = false;
	 return $this->render('cart-modal', compact('session'));

}


public function actionShow(){
	 $session = Yii::$app->session;
	 $session->open();
	 $this->layout = false;
	 return $this->render('cart-modal', compact('session'));
}

public function actionView() {
	 $session = Yii::$app->session;
	 $session->open();
	  $this->setMeta('ADM | Корзина');
	  $this->view->params['cartcount'] = $session['cart.qty'];
	  $order = new Ordershop();
	  if( $order->load(Yii::$app->request->post()) ){
	  	$order->qty = $session['cart.qty'];
	  	$order->sum = $session['cart.sum'];

	  	if( $order->save()){
	  	$this->saveOrderItems($session['cart'], $order->id);
		Yii::$app->session->setFlash('success', 'Спасибо за заказ! Наш Менеджер скоро свяжется с вами!');
		Yii::$app->mailer->compose('order', ['session' => $session])
			->setFrom(['admshop@gmail.com' => 'ADM'])
			->setTo($order->email)
			->setSubject('Заказ')
			->send();
		$session->remove('cart');
		$session->remove('cart.qty');
		$session->remove('cart.sum');
		return $this->refresh();
	  	}else{
	  		Yii::$app->session->setFlash('error', 'Ошибка выполнения заказа!');
	  	}
	  }

	 return $this->render('view', compact('session', 'order'));
}

	protected function saveOrderItems($items, $order_id){

		foreach ($items as $id => $item) {
			$order_items = new OrderItems();
			$order_items->order_id = $order_id;
			$order_items->product_id = $id;
			$order_items->name = $item['name'];
			$order_items->img = $item['img'];
			$order_items->size = $item['size'];
			$order_items->price = $item['price'];
			$order_items->qty_item = $item['qty'];
			$order_items->sum_item = $item['qty'] * $item['price'];
			$order_items->save();

		}

	}
}