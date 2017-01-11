<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


class LykkeUser extends ActiveRecord implements IdentityInterface{



  public static function tableName() {
    return 'lykke_user';
  }

  function findUserByEmail($email) {
    return LykkeUser::findOne(['email' => $email]);
  }

  function addNewUser($userInfo) {
    $user = new LykkeUser();

    $user->first_name = $userInfo->firstName;
    $user->last_name = $userInfo->lastName;
    $user->email = $userInfo->email;

    return $user->save() ? $user : FALSE;
  }


  public static function findIdentity($id) {
    return static::findOne($id);
  }

  public static function findIdentityByAccessToken($token, $type = NULL) {
    return static::findOne(['access_token' => $token]);
  }

  public function getId() {
    return $this->id;
  }

  public function getAuthKey() {
    return $this->authKey;
  }

  public function validateAuthKey($authKey) {
    return $this->authKey === $authKey;
  }

}