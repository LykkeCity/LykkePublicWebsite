<?php

namespace frontend\widgets;


use common\models\AssetPair;
use yii;
use yii\base\Widget;

class AssetPairs extends Widget {

  public $asset;
  public $pageUrl;


  function run() {
    if (!empty($this->asset)) {
      $asset = $this->asset;
      $pageUrl = $this->pageUrl;
      $AP = new AssetPair();
      $assetPairs = $AP->GetAssetPairs();
      return $this->render('AssetPairs', compact('asset','pageUrl', 'assetPairs'));
    }
  }

}