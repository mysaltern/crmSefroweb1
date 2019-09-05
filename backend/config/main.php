<?php

$params = array_merge(
        require __DIR__ . '/../../common/config/params.php', require __DIR__ . '/../../common/config/params-local.php', require __DIR__ . '/params.php', require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log', 'logvisitor'],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'controllerMap' => [
                'admin' => 'backend\controllers\user\AdminController',
                'profile' => 'backend\controllers\user\ProfileController',
                'recovery' => 'backend\controllers\user\RecoveryController',
                'registration' => 'backend\controllers\user\RegistrationController',
                'security' => 'backend\controllers\user\SecurityController',
                'settings' => 'backend\controllers\user\SettingsController',
            ],
            'admins' => ['admin']
        ],
        'session' => [
            'name' => 'PHPBACKSESSID',
            'savePath' => sys_get_temp_dir(),
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '[DIFFERENT UNIQUE KEY]',
            'csrfParam' => '_backendCSRF',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
        'filemanager' => [
            'class' => 'pendalf89\filemanager\Module',
            // Upload routes
            'routes' => [
// Base absolute path to web directory
                'baseUrl' => '',
                // Base web directory url
                'basePath' => '@frontend/web',
                // Path for uploaded files in web directory
                'uploadPath' => 'uploads',
            ],
            // Thumbnails info
            'thumbs' => [
                'small' => [
                    'name' => 'xs',
                    'size' => [100, 100],
                ],
                'medium' => [
                    'name' => 's',
                    'size' => [300, 200],
                ],
                'large' => [
                    'name' => 'm',
                    'size' => [500, 400],
                ],
            ],
        ],
        'menu' => [
            'class' => '\pceuropa\menu\Menu',
        ],
        'comment' => [
            'class' => 'yii2mod\comments\Module',
        ],
        'logvisitor' => [
            'class' => 'slavkovrn\logvisitor\LogVisitorModule',
        ],
        'user' => [
// following line will restrict access to profile, recovery, registration and settings controllers from backend
            'as backend' => 'dektrium\user\filters\BackendFilter',
        ],
    ],
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@backend/views/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],
        'logvisitor' => [
            'class' => 'slavkovrn\logvisitor\LogVisitorComponent',
            'filterIp' => '127.0.0.1,213.87.', /* comma separated substrings of IP  to be filtered of log in table , begining from first position  */
            'filterUri' => '/,debug', /* comma separated substrings of URI to be filtered of log in table */
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => true,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityCookie' => [
                'name' => '_backendIdentity',
//                'path' => '/admin',
                'httpOnly' => FALSE,
            ],
        ],
        'session' => [
            'name' => 'BACKENDSESSID',
            'cookieParams' => [
                'httpOnly' => true,
//                'path' => '/admin',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    /*
      'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' => [
      ],
      ],
     */
    ],
//    'as access' => [
//        'class' => yii2mod\rbac\filters\AccessControl::class,
//        'allowActions' => [
//            'site/*',
//            'rbac/*',
//            'admin/*',
//        // The actions listed here will be allowed to everyone including guests.
//// So, 'admin/*' should not appear here in the production, of course.
//// But in the earlier stages of your development, you may probably want to
//// add a lot of actions here until you finally completed setting up rbac,
//// otherwise you may not even take a first step.
//        ]
//    ],
    'params' => $params,
];
