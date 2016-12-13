<?php
/**
 * Created by PhpStorm.
 * User: Arkadiy
 * Date: 04.12.2016
 * Time: 23:22
 */

namespace frontend\widgets;


use Yii;
use yii\base\Widget;

class Frontend_Admin extends Widget{

  public function run() {
    if (!Yii::$app->user->isGuest){
      Yii::$app->view->registerCssFile('/css/frontend-admin.css');
      Yii::$app->view->registerJsFile('/js/frontend-admin.js');
      return $this->render('Frontend_Admin');
    }

  }

}