<?php


namespace frontend\controllers;


use common\models\SitePages;
use Yii;

class PagesController  extends AppController{

  public function actionIndex(){
    $page = SitePages::find()->where(['url' => trim(Yii::$app->request->getUrl(), '/')])->one();
    return $this->render($page['template'], ['page' => $page]);
  }

}