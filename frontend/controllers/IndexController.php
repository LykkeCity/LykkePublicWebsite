<?php


namespace frontend\controllers;

use common\models\SitePages;
use yii;

class IndexController extends AppController{


  function actionIndex () {
    $page = SitePages::find()->where(['url' => '/'])->one();
    $this->pageId = $page['id'];
    return $this->render('index', ['page' => $page]);
  }


}