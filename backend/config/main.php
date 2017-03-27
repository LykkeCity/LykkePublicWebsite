<?php
$params = array_merge(require(__DIR__.'/../../common/config/params.php'),
    require(__DIR__.'/params.php'));
$config = [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'homeUrl' => "/control",
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            "baseUrl" => "/control",
            'cookieValidationKey' => 'v1I-AXrOy2HKIj1s0JX5gSdJYZkuw8nV',
        ],
        'user' => [
            'identityClass' => 'common\models\LykkeUser',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend'],
            'loginUrl' => '/',
        ],
        'userAccess' => [
            'class' => 'common\models\LykkeUserAccess',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/page/<page:\d+>' => '<controller>/index',
                '<controller:\w+>' => '<controller>/index',
            ],
        ],
    ],
    'params' => $params,
    'defaultRoute' => 'index/index',
];
if (filter_var(getenv('YII_ENV_TEST'), FILTER_VALIDATE_BOOLEAN)) {
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
