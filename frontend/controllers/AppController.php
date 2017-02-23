<?php


namespace frontend\controllers;


use common\models\SitePages;
use yii\web\Controller;
use Yii;


class AppController extends Controller {

  public $pageId;

  protected function processPageRequest($param = 'page') {
    if (Yii::$app->request->isAjax && isset($_POST[$param])) {
      $_GET[$param] = Yii::$app->request->post($param);
    }
  }

  protected function cUrl($url, $params, $method = 'POST', $header = []) {

    if ($curl = curl_init()) {
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
      if (!empty($header)){
        curl_setopt($curl,CURLOPT_HTTPHEADER, $header);
      }

      if ($method == 'POST') {
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
      }
      $responseJson = json_decode(curl_exec($curl));
      curl_close($curl);
    }

    return $responseJson;

  }

}