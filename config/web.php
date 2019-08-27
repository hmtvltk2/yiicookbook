<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'simple',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@contrib' => '@app/contrib',
        '@main' => '@app/main',
    ],
    'timeZone' => 'Asia/Ho_Chi_Minh',
    'modules' => [
        'main' => 'main\Module',
        'contrib' => 'contrib\Module',
        'gridview' => '\kartik\grid\Module',
        'datecontrol' => '\kartik\datecontrol\Module',
        'admin' =>  [
            'class' => 'contrib\admin\Module',
            'layout' => '@app/layout/main',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'contrib\admin\controllers\AssignmentController',
                    // 'userClassName' => 'main\models\UserModel',
                    'idField' => 'id',
                    'usernameField' => 'username',
                    // 'fullnameField' => 'profile.full_name',
                    // 'extraColumns' => [
                    //     [
                    //         'attribute' => 'full_name',
                    //         'label' => 'Full Name',
                    //         'value' => function ($model, $key, $index, $column) {
                    //             return $model->profile->full_name;
                    //         },
                    //     ],
                    //     [
                    //         'attribute' => 'dept_name',
                    //         'label' => 'Department',
                    //         'value' => function ($model, $key, $index, $column) {
                    //             return $model->profile->dept->name;
                    //         },
                    //     ],
                    //     [
                    //         'attribute' => 'post_name',
                    //         'label' => 'Post',
                    //         'value' => function ($model, $key, $index, $column) {
                    //             return $model->profile->post->name;
                    //         },
                    //     ],
                    // ],
                    // 'searchClass' => 'app\models\UserSearch',

                ],
            ],
        ]
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'howhwhieurasfas',
        ],
        'formatter' => [
            'dateFormat' => 'dd/MM/yyyy',
            'timeFormat' => 'hh:mm:ss a',
            'datetimeFormat' => 'dd/MM/yyyy hh:mm:ss a'
        ],
        // 'assetManager' => [
        //     // 'linkAssets' => true,
        //     'bundles' => [
        //         'yii\bootstrap4\BootstrapAsset' => [
        //             'sourcePath' => '@contrib/assets/limitless',
        //             // 'baseUrl' => 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1',
        //             'css' => [
        //                 'css/bootstrap.min.css'
        //             ],
        //         ],
        //         // 'yii\bootstrap4\BootstrapPluginAsset' => [
        //         //     'sourcePath' => null,
        //         //     'baseUrl' => 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1',
        //         //     'js' => [
        //         //         'js/bootstrap.min.js'
        //         //     ],
        //         // ],
        //     ],
        // ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'main\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => 'admin/user/login'
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'hmtvltk2@gmail.com',
                'password' => 'ggtawaxmtukqiidj',
                'port' => '587',
                'encryption' => 'tls',
            ],
            'useFileTransport' => false
        ],
        'errorHandler' => [
            //TODO: Change errorAction
            'errorAction' => 'main/site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logVars' => ['_GET', '_POST'],
                    'logFile' => '@runtime/logs/' . date('Y') . '/' . date('m') . '/' . date('d') . '/error.log'
                ],
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['info'],
                    'categories' => ['userWrite', 'userRead'],
                    'logVars' => [],
                ],
            ],
        ],
        'view' =>  [
            'theme' => [
                'pathMap' => [
                    '@mdm/admin/views' => '@mdm/admin/themes/metronic',
                    '@mdm/admin/views' => [
                        '@main/themes/custom',
                    ],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],


    ],
    //TODO: Change default route
    'defaultRoute' => 'main/site/index',
    'params' => $params,
    // 'as access' => [
    //     'class' => 'contrib\admin\components\AccessControl',
    //     'allowActions' => [
    //         'main/site/*',
    //         'admin/*',
    //     ]
    // ],
    'as beforeRequest' => [
        'class' => 'yii\filters\AccessControl',
        'rules' => [
            [
                'allow' => true,
                'actions' => ['login', 'test'],
            ],
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ]
    ],
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

    // $config['components']['assetManager']['forceCopy'] = true;
}

return $config;
