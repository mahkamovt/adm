<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['devicedetect'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language'=>'ru-Ru',
    'defaultRoute' => 'category/index',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'admin',
            'defaultRoute' => 'ordershop/index',

        ],

            'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['127.0.0.1', '::1']

        ],

        'rbac' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                 'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    /* 'userClassName' => 'app\models\User', */
                    'idField' => 'id',
                    'usernameField' => 'username',

                ],
            ],
              'layout' => 'left-menu',
              'mainLayout' => '@app/modules/admin/views/layouts/admin.php',
        ],
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'images/store', //path to origin images
            'imagesCachePath' => 'images/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
            'placeHolderPath' => '@webroot/images/placeHolder.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
            'imageCompressionQuality' => 100, // Optional. Default value is 85.
        ],
    ],
   // 'layout' => 'basic',
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],


        'cache' => 'yii\caching\ApcCache',

        'devicedetect' => [
        'class' => 'alexandernst\devicedetect\DeviceDetect'
          ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '270oAol9K68RIY0QBB5YKSk5nerxaSE3',
            'baseUrl'=> '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'mdm\admin\models\User',
            'loginUrl' => ['rbac/user/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
           /*  'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mail.me.com',
                'username' => 'mahkamovt@icloud.com',
                'password' => '140295**Timur',
                'port' => '587',
                'encryption' => 'ssl',
            ],*/
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //'category/<id:\d+>/page/<page:\d+>' => 'category/view',
               '<id:\d+\/?>images/image-by-item-and-alias' => 'yii2images/images/image-by-item-and-alias',
               'category/<id:\d+\/?>' => 'category/view',
               'product/<id:\d+\/?>' => 'product/view',

                'account/<id:\d+>/update/'=>'admin/user/update',
                'search' => 'category/search',
                'delivery' => 'delivery/index',
                'adm' => 'adm/index',
                'login' => 'rbac/user/login',
                'signup' => 'rbac/user/signup',
                'admin/users' => 'rbac/user',
                'reset-password' => 'rbac/user/request-password-reset',
                'change-password' => 'rbac/user/change-password',
                'account' => 'admin/ordersuser',
                'articles' => 'post/index',
                'articles/show/<id:\d+\/?>'=>'post/show'

            ],
        ],



    ],


           'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'category/*',
           'product/*',
           'cart/*',
           'yii2images/*',
            'delivery/*',
            'site/*',
            'post/*',
            'adm/*',
            'admin/ordersuser/*',
            'admin/users',
            'rbac/user/signup',
            'rbac/user/login',
            'rbac/user/request-password-reset',
            'rbac/user/change-password',
            'site/error',
            'admin/user/update',
            'gii/*'



        ]
    ],

        'controllerMap' => [
                'elfinder' => [
                    'class' => 'mihaildev\elfinder\PathController',
                    'access' => ['@'],
                    'root' => [
                        'path' => 'upload/global',
                        'name' => 'global'
                    ],
                    'watermark' => [
                                'source'         => __DIR__.'/logo.png', // Path to Water mark image
                                 'marginRight'    => 5,          // Margin right pixel
                                 'marginBottom'   => 5,          // Margin bottom pixel
                                 'quality'        => 95,         // JPEG image save quality
                                 'transparency'   => 70,         // Water mark image transparency ( other than PNG )
                                 'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
                                 'targetMinPixel' => 200         // Target image minimum pixel size
                    ]
                ]
            ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;
