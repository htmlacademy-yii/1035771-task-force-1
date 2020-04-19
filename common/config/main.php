<?php
return [
    'language' => 'ru',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => ['language' => 'ru-RU',

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
