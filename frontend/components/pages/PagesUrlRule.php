<?php

namespace frontend\components\pages;

use common\models\SitePages;
use yii;
use yii\caching\DbDependency;
use yii\web\CompositeUrlRule;
use yii\web\UrlRuleInterface;
use yii\base\InvalidConfigException;

class PagesUrlRule extends CompositeUrlRule {

  public $cacheComponent = 'cache';

  public $cacheID = 'PagesUrlRules';

  public $ruleConfig = ['class' => 'yii\web\UrlRule'];

  protected function createRules() {
    $cache = \Yii::$app->get($this->cacheComponent)->get($this->cacheID);
    /*if (!empty($cache)) {
      return $cache;
    }*/

    $pages = SitePages::find()->asArray(TRUE)->all();

    $rules = [];
    foreach ($pages as $page) {

      $rule = [
        'pattern' => ltrim(str_replace("#", "\#", $page['url']), '/'),
        'route'   => ltrim($page['route'], '/'),
      ];

      $rule = \Yii::createObject(array_merge($this->ruleConfig, $rule));
      if (!$rule instanceof UrlRuleInterface) {
        throw new InvalidConfigException('URL rule class must implement UrlRuleInterface.');
      }

      $rules[] = $rule;
    }
    
    $cd = new DbDependency();
    $cd->sql = 'SELECT MAX(id) FROM ' . SitePages::tableName();

    \Yii::$app->get($this->cacheComponent)
      ->set($this->cacheID, $rules, 60, $cd);

    return $rules;

  }

  public function __wakeup() {
    $this->init();
  }

}