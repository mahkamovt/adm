<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppParallel extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/normalize.min.css',
        'css/webflow.min.css',
        'css/fuzzllc.webflow.min.css',

    ];
    public $js = [
        'js/modernizr.js',
        'js/three.min.js',
        'js/webflow.js',
        'js/main.js',
        'js/home.min.js',

    ];
    public $jsOptions = [
    'position' => \yii\web\View::POS_END

    ];
    public $depends = [
        'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',
 'yii\bootstrap\BootstrapPluginAsset',

    ];


}
