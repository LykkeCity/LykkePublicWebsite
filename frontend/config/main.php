<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

$config = [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'assetsAutoCompress'],
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
              '/asset/<asset:\w+\/?.*>' => 'asset/index',
              ['class' => 'frontend\components\pages\PagesUrlRule'],
              ['class' => 'frontend\components\pages\StrictParseRequest']
            ],
        ],

      'assetsAutoCompress' =>
          [
            'class'                         => '\skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
            'enabled'                       => filter_var(getenv('YII_ENV_TEST'), FILTER_VALIDATE_BOOLEAN) ? false : true,

            'readFileTimeout'               => 3,           //Time in seconds for reading each asset file

            'jsCompress'                    => true,        //Enable minification js in html code
            'jsCompressFlaggedComments'     => true,        //Cut comments during processing js

            'cssCompress'                   => true,        //Enable minification css in html code

            'cssFileCompile'                => true,        //Turning association css files
            'cssFileRemouteCompile'         => false,       //Trying to get css files to which the specified path as the remote file, skchat him to her.
            'cssFileCompress'               => true,        //Enable compression and processing before being stored in the css file
            'cssFileBottom'                 => false,       //Moving down the page css files
            'cssFileBottomLoadOnJs'         => false,       //Transfer css file down the page and uploading them using js

            'jsFileCompile'                 => true,        //Turning association js files
            'jsFileRemouteCompile'          => false,       //Trying to get a js files to which the specified path as the remote file, skchat him to her.
            'jsFileCompress'                => true,        //Enable compression and processing js before saving a file
            'jsFileCompressFlaggedComments' => true,        //Cut comments during processing js

            'htmlCompress'                  => true,        //Enable compression html
            'htmlCompressOptions'           =>              //options for compressing output result
              [
                'extra' => true,        //use more compact algorithm
                'no-comments' => true   //cut all the html comments
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
