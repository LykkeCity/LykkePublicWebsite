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


  function admin($post){
    $access = self::findOne(['lykke_user_id' => $post['id']]);
    $access->admin_panel = $post['data'];
    return $access->save() ? TRUE : FALSE;
  }

  function Frontend($post){
    $access = self::findOne(['lykke_user_id' => $post['id']]);
    $access->edit_frontent = $post['data'];
    return $access->save() ? TRUE : FALSE;
  }
  
}