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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
         'css/font-awesome.min.css',
         ['css/main.css'],
         'css/responsive.css',

    ];
    public $js = [
   'js/jquery.lazyload.min.js',
   'js/jquery.scrollstop.min.js',
   'js/jquery.scrollUp.min.js',
   'js/jquery.cookie.js',
   'js/jquery.accordion.js',
   'js/jquery.zoom.js',
   'js/pace.min.js',
   'js/select.js',
   'js/main.js',
   'js/sw.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
