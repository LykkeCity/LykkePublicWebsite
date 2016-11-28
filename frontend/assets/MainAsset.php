<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use Yii;
use yii\web\View;

class MainAsset extends AssetBundle
{

  function init() {

    $this->jsOptions['position'] = View::POS_HEAD;

    if (Yii::$app->request->url == Yii::$app->homeUrl
      || Yii::$app->request->url == '/city'
      || Yii::$app->request->url == '/corp'
    ) {
      $this->css[] = '/css/site_new.css';
    }else{
      $this->css[] = '/css/site.css';
    }

    parent::init();

  }


  public $basePath = '@webroot';
  public $baseUrl = '@web';

  public $css = [
    'css/bootstrap.min.css'
  ];

  public $js = [
    'js/jquery-1.11.2.min.js',
    'js/bootstrap.min.js',
    'js/fastclick.min.js',
    'js/jquery.inview.min.js',
    'js/jquery.royalslider.custom.min.js',
    'js/jquery.ajaxchimp.min.js',
    'js/functions.js',
  ];
  
}