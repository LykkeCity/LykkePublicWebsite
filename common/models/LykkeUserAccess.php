<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;



class LykkeUserAccess extends ActiveRecord {

  public static function tableName() {
    return 'lykke_user_access';
  }


  function access($name){
    $access =  LykkeUserAccess::findOne(['lykke_user_id' => Yii::$app->user->id]);
    return !empty($access) ? $access->{$name} : FALSE;
  }

  function accessByNewUser($id){
    $access = new LykkeUserAccess();
    $access->lykke_user_id = $id;
    $access->save();
  }

}