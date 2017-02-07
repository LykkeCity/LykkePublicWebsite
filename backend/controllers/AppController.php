<?php

namespace backend\controllers;


use Yii;
use yii\web\Controller;

class AppController extends Controller{

  function init() {
    if (Yii::$app->userAccess->access('admin_panel') == 0){
      return Yii::$app->response->redirect(Yii::$app->urlManager->hostInfo);
    }
    parent::init();
  }
}