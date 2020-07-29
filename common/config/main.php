<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
return [
'controllerMap' => [
    'fixture' => [
        'class' => 'yii\faker\FixtureController',
        'templatePath' => '/common/tests/data/templates',
        'fixtureDataPath' => '/common/tests',
    ],
    // ...
],
// ...
];
