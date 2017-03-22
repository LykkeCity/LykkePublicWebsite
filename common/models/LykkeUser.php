<?php
namespace common\models;

use Yii;
use yii\data\Pagination;
use yii\data\SqlDataProvider;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\db\Query;


class LykkeUser extends ActiveRecord implements IdentityInterface {


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
    $user->kyc_status = $userInfo->kyc_status;
    $user->blocked_comment = 0;

    return $user->save() ? $user : FALSE;
  }

  function updateUserData($id, $userInfo) {
    $user = static::findOne($id);

    $user->first_name = $userInfo->firstName;
    $user->last_name = $userInfo->lastName;
    $user->email = $userInfo->email;
    $user->kyc_status = $userInfo->kyc_status;

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

  public static function getAll() {

    $sql = (new Query)->select("
        ua.*,
        ua.id as ua_id,
        lu.*
      ")
      ->from(self::tableName() . ' as lu')
      ->leftJoin(LykkeUserAccess::tableName() . ' ua', 'lu.id = ua.lykke_user_id');

    $users = $sql->createCommand()->queryAll();

    return $users;
  }

  public function getAuthKey() {
    return $this->authKey;
  }

  public function validateAuthKey($authKey) {
    return $this->authKey === $authKey;
  }

  public function userBlockedComment($id) {
    $user = static::findOne($id);
    $user->blocked_comment = 1;
    return $user->save() ? $user : FALSE;
  }

  function blockedComment($post) {
    $user = self::findOne(['id' => $post['id']]);
    $user->blocked_comment = $post['data'];
    return $user->save() ? TRUE : FALSE;
  }

  function notifySpam($post) {
    $user = self::findOne(['id' => $post['id']]);
    $user->notify_spam = $post['data'];
    return $user->save() ? TRUE : FALSE;
  }


}