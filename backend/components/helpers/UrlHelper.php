<?php

namespace backend\components\helpers;

use yii;
use yii\helpers\Url;

class UrlHelper extends Url {

  public static function isActive($url, $class = 'active') {

    $url = strripos($url, '/') ? $url : $url.'/index';
    
    if (Yii::$app->controller->id.'/'.Yii::$app->controller->action->id == $url)
      return $class;

    return null;

  }

}