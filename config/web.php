<?php

$params = require(__DIR__.'/params.php');

$config = [
    'id' => 'TODOS.List',
    'name' => 'TODOS.List',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => f,
            'enableStrictParsing' => false,
            'rules' => [
                '<alias:index|about>' => 'site/<alias>',
                '<alias:login|logout|register|forgot|resend|account>' => 'user/<alias>',
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'jSaaFPRt8LWk92bYQBBUTNSRMQnrdOme',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'app\modules\user\components\User',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'localhost', // Set localhiost to use with maildev | Exp: smtp.gmail.com
//                'username' => '', // User authenticatio for you email provider
//                'password' => '',// User password for you email provider
                'port' => '1025', // Port 25 is a very common port too, 1025 to use maildev
                'encryption' => 'tls', // It is often used, check your provider or mail server specs
            ],
            'messageConfig' => [
                'from' => ['noreply@todolist.com' => 'TODOS.List'],
                'charset' => 'UTF-8',
            ]
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
        'db' => require(__DIR__.'/db.php'),
    ],
    'modules' => [
        'user' => [
            'class' => 'app\modules\user\Module',
        // set custom module properties here ...
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
