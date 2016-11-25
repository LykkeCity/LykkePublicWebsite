<?php


namespace frontend\controllers;


use common\models\SitePages;
use yii\web\Controller;
use Yii;



class AppController  extends Controller{

  public $siteMenu;


  function init() {
    parent::init();
    $this->siteMenu = SitePages::getListPages(TRUE);
    Yii::$app->view->params['siteMenu'] = $this->siteMenu ;
  }
}