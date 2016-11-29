<?php

namespace frontend\widgets;


use backend\components\helpers\UrlHelper;
use common\models\SitePages;
use yii\base\Widget;

class SubMenu extends Widget {

  public $parentId;


  function run() {
    if (!empty($this->parentId)) {

      $subMenu = SitePages::find()
        ->select(['name', 'url'])
        ->where(['parent' => $this->parentId])
        ->all();

      $currentUri = ltrim(UrlHelper::to(), '/');

      MainMenu::$parentId = $this->parentId;

      return $this->render('SubMenu', compact('subMenu', 'currentUri'));
    }
  }

}