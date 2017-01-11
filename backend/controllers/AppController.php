<?php

namespace backend\controllers;


use Yii;
use yii\web\Controller;

class AppController extends Controller{

  function init() {
    parent::init();
    if (Yii::$app->userAccess->access('admin_panel') != 1){
      Yii::$app->response->redirect('/');
    }
  }
}