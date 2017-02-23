<?php


namespace common\models;


class Redirects extends \yii\db\ActiveRecord{
  public static function tableName() {
    return 'redirects';
  }

  function getAllRedirect(){
    return self::find()->asArray()->all();
  }

  function addRedirect($post){
    $redirect = new Redirects();

    $redirect->redirect_with = trim(trim($post['redirect_with'], '/'));
    $redirect->redirect_to = trim(trim($post['redirect_to'], '/'));

    return $redirect->save() ? $redirect : FALSE;

  }

  function deleteRedirect($id){
    $redirect = self::findOne($id);
    $redirect->delete();
  }

}