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
        'css/site.css',
    ];
    public $js = [
      'js/bootstrap.min.js',
      'js/fastclick.min.js',
      'js/jquery.inview.min.js',
      'js/jquery.royalslider.custom.min.js',
      'js/jquery.ajaxchimp.min.js',
      'js/functions.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
