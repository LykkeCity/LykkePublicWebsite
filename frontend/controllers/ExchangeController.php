<?php


namespace frontend\controllers;


use common\models\Asset;
use common\models\SitePages;
use Yii;

class ExchangeController  extends AppController{

  public function actionIndex(){

    $page = SitePages::find()->where(['url' => trim(Yii::$app->request->getUrl(), '/')])->one();
    $this->pageId = $page['id'];
    $assets = Asset::find()->asArray()->all();

    Yii::$app->view->title = empty($page['title']) ? $page['name'] : $page['title'];

    Yii::$app->view->registerMetaTag([
      'name' => 'description',
      'content' =>$page['description']
    ]);

    Yii::$app->view->registerMetaTag([
      'name' => 'keywords',
      'content' =>$page['keywords']
    ]);

    return $this->render("index", ['page' => $page, 'assets' => $assets]);


  }

}