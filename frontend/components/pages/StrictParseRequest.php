<?php

namespace frontend\components\Pages;

use yii;
use yii\web\CompositeUrlRule;

class StrictParseRequest extends CompositeUrlRule {

  public $ruleConfig = ['class' => 'yii\web\UrlRule'];
  public $onlyGET = TRUE;

  protected function createRules() {

    $verb = NULL;
    if ($this->onlyGET) {
      $verb = 'GET';
    }

    return [
      \Yii::createObject(array_merge($this->ruleConfig, [
        'pattern' => '<m>/<c>/<a>',
        'route'   => '<m>/<c>/<a>',
        'verb'    => $verb
      ])),
      \Yii::createObject(array_merge($this->ruleConfig, [
        'pattern' => '<c>/<a>',
        'route'   => '<c>/<a>',
        'verb'    => $verb
      ]))
    ];

  }

  public function __wakeup() {
    $this->init();
  }


  public function parseRequest($manager, $request) {
    $result = parent::parseRequest($manager, $request);

    if (empty($result)) {
      return $result;
    }


    $url = array_merge([
      '/' . $result[0],
      $result[1],
      $request->getQueryParams()
    ]);

    $canonical = $manager->createUrl($url);

    if ($request->url != $canonical) {
      \Yii::$app->response->redirect($canonical, 301);
    }

    return $result;

  }


}