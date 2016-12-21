<?php


namespace frontend\controllers;


use common\models\Asset;
use common\models\SitePages;
use Yii;

class ExchangeController  extends AppController{

  public function actionIndex($asset = ""){
    //TODO - костыль, потом убрать
    $uri = explode('/', ltrim(Yii::$app->request->getUrl(), '/'));

    $page = SitePages::find()->where(['url' => $uri[0]])->one();
    $this->pageId = $page['id'];

    if (empty($asset))
      return $this->render("index", ['page' => $page]);

    $assetInfo = Asset::find()->where(['name' => $asset])->one();

    return $this->render("details_asset", ['page' => $page,'assetInfo' => $assetInfo]);

  }

}