<?php


namespace frontend\controllers;


use common\models\Redirects;
use common\models\SitePages;
use yii\web\Controller;
use Yii;
use yii\web\Response;


class AssetController extends AppController {


  function actionIndex($asset) {

    $extension = ['.txt', '.json'];

    $response = $this->getAssetBlob($asset);

    if ($response == FALSE) {
      $response = $this->getAssetBlob(strtolower($asset));
    }

    if ($response == FALSE) {
      $response = $this->getAssetBlob(strtoupper($asset));
    }

    if ($response == FALSE) {
      foreach ($extension as $ext) {
        $response = $this->getAssetBlob($asset . $ext);
        if ($response != FALSE) {
          break;
        }
      }
    }


    if ($response == FALSE) {
      foreach ($extension as $ext) {
        $response = $this->getAssetBlob(strtolower($asset . $ext));
        if ($response != FALSE) {
          break;
        }
      }
    }

    if ($response == FALSE) {
      foreach ($extension as $ext) {
        $response = $this->getAssetBlob(strtoupper($asset) . $ext);
        if ($response != FALSE) {
          break;
        }
      }
    }


    $finfo = new \finfo(FILEINFO_MIME);
    header('Content-Type: '.$finfo->buffer($response));

    echo $response;


  }


  function getAssetBlob($asset) {
    return file_get_contents('https://ccnsme.blob.core.windows.net:443/lykke/' . $asset);
  }

}