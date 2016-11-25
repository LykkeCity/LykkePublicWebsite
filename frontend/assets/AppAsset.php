<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/site.css',
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
