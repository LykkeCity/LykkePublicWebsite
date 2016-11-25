<?php


namespace frontend\controllers;

use common\models\SitePages;

class IndexController extends AppController{


  function actionIndex () {
    $page = SitePages::find()->where(['url' => '/'])->one();
    return $this->render('index', ['page' => $page]);
  }

  function actionTest (){
   $page = SitePages::find()->where(['url' => trim(Yii::$app->request->getUrl(), '/')])->one();
    return $this->render('test', ['page' => $page]);
  }


}