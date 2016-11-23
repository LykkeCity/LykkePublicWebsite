<?php


namespace backend\controllers;


use yii\web\Controller;

class Index extends Controller{

  function actionIndex () {
    return $this->render('index');
  }

}