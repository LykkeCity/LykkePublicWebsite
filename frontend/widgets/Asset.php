<?php

namespace frontend\widgets;


use common\classes\AssetApi;
use yii;
use yii\base\Widget;
use yii\web\View;

class Asset extends Widget {

  public $asset;

  function run() {


    if (!empty($this->asset)) {
      $asset = $this->asset;

      $assetApi = new AssetApi();
      $assetsPairData = $assetApi->GetAssetsData($this->asset);

      Yii::$app->view->registerJsFile('/js/asset.js',  ['position' => View::POS_END, 'depends' => 'frontend\assets\MainAsset']);

      return $this->render('Asset', compact('asset', 'assetsPairData'));
    }
  }

}