<?php

// Turn off all error reporting
// error_reporting(0);

// Report all errors except E_NOTICE
// This is the default value set in php.ini

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';
require __DIR__ . '/../functions.php';
(new yii\web\Application($config))->run();
