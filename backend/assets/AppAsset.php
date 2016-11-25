<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/plugins/datetimepicker/datetimepicker.min.css',
    ];
    public $js = [
      'js/plugins/tinymce/tinymce.min.js',
      'js/plugins/moment/moment.js',
      'js/plugins/datetimepicker/datetimepicker.min.js',
      'js/scripts.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
