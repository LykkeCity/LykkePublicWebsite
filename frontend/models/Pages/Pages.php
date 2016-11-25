<?php

namespace frontend\models\Pages;

use yii;
use yii\db\ActiveRecord;

class Pages extends ActiveRecord {

  public static function tableName() {
    return 'site_pages';
  }
  

}