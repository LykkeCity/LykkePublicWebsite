<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

$config = [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'homeUrl' => "/",
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => "",
             // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'NdzsZo-Wmetf46XSCak-aU6Hbi2HuHpb',
        ],
        'user' => [
            'identityClass' => 'common\models\LykkeUser',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend']
        ],
        'userAccess' =>[
          'class' => 'common\models\LykkeUserAccess'
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
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
              $params['uri_blog'].'/<post_url:\w+>' => 'blog/index',
              $params['uri_news'].'/<post_url:\w+>' => 'news/index',
              ['class' => 'frontend\components\pages\PagesUrlRule'],
              ['class' => 'frontend\components\pages\StrictParseRequest']
            ],
        ],

    ],
    'params' => $params,
    'defaultRoute' => 'index/index'
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
