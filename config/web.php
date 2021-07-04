<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'MaxiOrphy',
    'name' => 'MaxiOrphy',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'xQ2nWy96RxBoKIxaNnoVY_V0mugT2ugS',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'user' => [
            'class' => 'app\components\User',
            'identityClass' => 'app\models\User',
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'encryption' => 'tls',
                'port' => '587',
                'username' => 'maxiorphy@gmail.com',
                'password' => 'WebDev2020',
            ],
            'messageConfig' => [
                'from' => ['maxiorphy@gmail.com' => 'MaxiOrphy'], // this is needed for sending emails
                'charset' => 'UTF-8',
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
            'rules' => [
            ],
        ],

        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/modules/views' => '@app/views/user',
               ],
            ],
        ],


    ],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
        'user' => [
            'class' => 'app\modules\Module',
            'requireEmail' => true,
            'requireUsername' => true,
            'controllerMap' => [
                'default' => 'app\controllers\DefaultController',
                'admin' => 'app\controllers\AdminController',
            ],
            'modelClasses'  => [
                'User' => 'app\models\User',
                'Profile' => 'app\models\Profile',
                'Role' => 'app\models\Role',
                'UserAuth' => 'app\models\UserAuth',
                'UserToken' => 'app\models\UserToken',
            ],
            'emailViewPath' => '@app/mail/user',


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
