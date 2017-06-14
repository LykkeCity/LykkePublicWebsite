<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use Yii;
use yii\web\View;

class MainAsset extends AssetBundle
{

  public $basePath = '@webroot';
  public $baseUrl = '@web';

  public $css = [
    'css/vendor/bootstrap-custom.min.css',
    '/css/style.css',
    '/css/style_addon.css',
    '/css/ico_aside.css',
    '/css/exchange/assets.css',
    '/css/exchange/advanced-chart.css',
  ];

  public $js = [
    'js/vendor/angular.min.js',
    'js/vendor/jquery.min.js',
    'js/vendor/bootstrap-custom.min.js',
    'js/vendor/fastclick.min.js',
    'js/vendor/jquery.inview.min.js',
    'js/vendor/autosize.min.js',
    'js/plugins/tinymce/tinymce.min.js',
    'https://www.youtube.com/iframe_api',
    'js/YouTube.js',
    'js/functions.js',
    'js/b2b.js',
    'js/invest.js',
    'js/leadership_modal.js',
    'js/controllers.js',
    '/js/exchange/advanced-chart.js',
    '/js/exchange/assets.js',
    '/js/exchange/datafeed/datafeed.js',
    '/js/exchange/datafeed/LykkeAssetsStorage.js',
    '/js/exchange/datafeed/LykkeDataStorage.js',
    '/js/exchange/datafeed/LykkeTVStorageAdapter.js',
    '/js/app.js',
  ];
  
}