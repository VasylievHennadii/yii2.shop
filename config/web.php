<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'home/index',
    'language' => 'ru',
    // 'name' => 'Grocery Store a Ecommerce Online Shopping',
    'name' => 'Grocery Store',
    'layout' => 'grocery',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [            
            'class' => 'app\modules\admin\Module',
            'layout' => 'admin',
            'defaultRoute' => 'main/index',
        ],
    ],
    'components' => [
        'formatter' => [
            'datetimeFormat' => 'php:d F Y H:i:s',
//            'decimalSeparator' => ',',
//            'thousandSeparator' => ' ',
//            'currencyCode' => 'EUR',
       ],
        /*настройка комплекта ресурсов*/
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,   // не опубликовывать комплект
                    'js' => [
                        'js/jquery-1.11.1.min.js',
                    ]
                ],
            ],
        ],
        /*настройка комплекта ресурсов*/
        
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'BIdAvmB3CmxosOUA105F4fFQXPPYuGfb',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => '/admin/auth/login',
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
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.ukr.net',
                'username' => 'petpolimer@ukr.net',
                'password' => 'mixrDlzS2JEEYOFa',
                'port' => '2525', //465
                'encryption' => 'ssl', //tls
            ],
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
            'enableStrictParsing' => false,
            'rules' => [
                'category/<id:\d+>/page/<page:\d+>' => 'category/view', //формат ссылки 'category/1?page=2' меняем на 'category/1/page/2' для ПАГИНАЦИИ
                'category/<id:\d+>' => 'category/view', //формат ссылки 'category/view?id=1' меняем на 'category/1'
                'product/<id:\d+>' => 'product/view', //формат ссылки 'product/view?id=1' меняем на 'product/1'
                'search' => 'category/search', //формат ссылки 'category/search?q=soup' меняем на 'search?q=soup'
            ],
        ],        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
