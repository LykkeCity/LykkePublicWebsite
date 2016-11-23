<?php


namespace backend\controllers;


use yii\web\Controller;

class IndexController extends Controller{

  function actionIndex () {
    return $this->render('index');
  }

}