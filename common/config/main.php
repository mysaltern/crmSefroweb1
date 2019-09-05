<?php

return [
    'language' => 'fa-IR',
    'sourceLanguage' => 'fa-IR',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'modules' => [
        'rbac' => 'dektrium\rbac\RbacWebModule',
//        'gallery' => [
//            'class' => 'onmotion\gallery\Module',
//        ],
        'user' => [
            'class' => 'dektrium\user\Module',
        // you will configure your module inside this file
        // or if need different configuration for frontend and backend you may
        // configure in needed configs
        ],
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'mycomponent' => [
            'class' => 'common\components\MyComponent',
        ],
        'authManager' => [
            'class' => 'dektrium\rbac\components\DbManager',
        ],
        'jdf' => [
            'class' => '\sgh370\jdf\Jdf'
        ],
        'i18n' => [
            'translations' => [
                'yii2mod.rbac' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/rbac/messages',
                ],
                'yii2mod.comments' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/comments/messages',
                ],
                'frontend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
//    'as access' => [
//        'class' => yii2mod\rbac\filters\AccessControl::class,
//        'allowActions' => [
//            'site/*',
//            'admin/*',
//        // The actions listed here will be allowed to everyone including guests.
//        // So, 'admin/*' should not appear here in the production, of course.
//        // But in the earlier stages of your development, you may probably want to
//        // add a lot of actions here until you finally completed setting up rbac,
//        // otherwise you may not even take a first step.
//        ]
//    ],
];
