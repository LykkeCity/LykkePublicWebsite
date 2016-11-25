<?php


namespace frontend\controllers;


use common\models\SitePages;
use Yii;
use yii\web\Controller;

class IndexController extends Controller{


  function actionIndex () {
    return $this->render('index');
  }

  function actionTest (){
   $page = SitePages::find()->where(['url' => trim(Yii::$app->request->getUrl(), '/')])->one();
    return $this->render('test', ['page' => $page]);
  }


}