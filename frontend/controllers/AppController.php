<?php


namespace frontend\controllers;


use common\models\SitePages;
use yii\web\Controller;
use Yii;



class AppController  extends Controller{

  public $pageId;

  protected function processPageRequest($param='page')
  {
    if (Yii::$app->request->isAjax && isset($_POST[$param]))
      $_GET[$param] = Yii::$app->request->post($param);
  }

}