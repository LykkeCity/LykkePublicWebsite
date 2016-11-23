<?php

namespace backend\components\helpers;

use yii;
use yii\helpers\Url;

class UrlHelper extends Url {

  public static function isActive($controller, $class) {
    if (Yii::$app->controller->id == $controller)
      return $class;

    return null;
  }

}