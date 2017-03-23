<?php

namespace frontend\widgets;


use backend\components\helpers\UrlHelper;
use common\models\SitePages;
use yii;
use yii\base\Widget;

class SideMenu extends Widget {

  public static $parentId;

  function run() {
    return $this->render('SideMenu');
  }

}