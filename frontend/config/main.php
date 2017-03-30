<?php
use yii\web\AssetBundle;

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
                'company' => 'company/index',
                'contacts' => 'company/contacts',
                'technology' => 'company/technology',
                'b2b' => 'b2b/index',
                'b2b-join' => 'b2b/join',
                'b2b-deploy' => 'b2b/deploy',
                'b2b-thanks' => 'b2b/thanks',
              $params['uri_blog'].'/<post_url:\w+>' => 'blog/index',
              $params['uri_news'].'/<post_url:\w+>' => 'news/index',
              '/asset/<asset:\w+\/?.*>' => 'asset/index',
              ['class' => 'frontend\components\pages\PagesUrlRule'],
              ['class' => 'frontend\components\pages\StrictParseRequest']
            ],
        ],

        'view' => [
          'class' => '\rmrevin\yii\minify\View',
          'enableMinify' => !YII_DEBUG,
          'concatCss' => true, // concatenate css
          'minifyCss' => true, // minificate css
          'concatJs' => true, // concatenate js
          'minifyJs' => true, // minificate js
          'minifyOutput' => true, // minificate result html page
          'webPath' => '@web', // path alias to web base
          'basePath' => '@webroot', // path alias to web base
          'minifyPath' => '@webroot/assets/minify', // path alias to save minify result
          'jsPosition' => [ \yii\web\View::POS_END ], // positions of js files to be minified
          'forceCharset' => 'UTF-8', // charset forcibly assign, otherwise will use all of the files found charset
          'expandImports' => true, // whether to change @import on content
          'compressOptions' => ['extra' => true], // options for compress
          'excludeFiles' => [
            'jquery.js', // exclude this file from minification
            'app-[^.].js', // you may use regexp
          ],
          'excludeBundles' => [
            AssetBundle::class, // exclude this bundle from minification
          ],
        ]
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
