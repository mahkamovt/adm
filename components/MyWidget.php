<?php
namespace app\components;
use yii\base\Widget;

class MyWidget extends Widget {

	public $name;
	public function init(){
		parent::init();
		ob_start();
	}

	public function run(){
		//return $this->render('my', ['name' => $this->name]);

$content = ob_get_clean();
$content = mb_strtoupper($content);
return $this->render('my', compact('content'));

	}


}