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
    '/css/ico_aside.css'
  ];

  public $js = [
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
  ];
  
}