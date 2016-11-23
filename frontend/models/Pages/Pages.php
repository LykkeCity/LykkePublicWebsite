<?php

namespace frontend\models\Pages;

use yii;
use yii\db\ActiveRecord;

class Pages extends ActiveRecord {

  public static function tableName() {
    return 'pages';
  }

  public function rules() {
    return [
      [['alias, route'], 'required'],
      [['alias'], 'string', 'max' => 190],
      [['route'], 'string', 'max' => 255],
      [['alias'], 'unique']
    ];
  }

  public function attributeLabels() {
    return [
      'id'    => "ID",
      'alias' => 'Alias',
      'route' => 'Route'
    ];
  }

}