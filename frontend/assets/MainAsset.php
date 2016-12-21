<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use Yii;
use yii\web\View;

class MainAsset extends AssetBundle
{

  function init() {

    $this->jsOptions['position'] = View::POS_HEAD;

    parent::init();

  }


  public $basePath = '@webroot';
  public $baseUrl = '@web';

  public $css = [
    'css/bootstrap.min.css',
    '/css/site.css'
  ];

  public $js = [
    'js/jquery-1.11.2.min.js',
    'js/bootstrap.min.js',
    'js/fastclick.min.js',
    'js/jquery.inview.min.js',
    'js/jquery.royalslider.custom.min.js',
    'js/jquery.ajaxchimp.min.js',
    'js/plugins/tinymce/tinymce.min.js',
    'https://www.youtube.com/iframe_api',
    'js/YouTube.js',
    'js/functions.js',
  ];
  
}