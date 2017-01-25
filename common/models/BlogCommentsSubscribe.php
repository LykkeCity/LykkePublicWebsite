<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\data\SqlDataProvider;


class BlogCommentsSubscribe extends ActiveRecord {

  public static function tableName() {
    return 'blog_comments_subscribe';
  }

  function subscribe($postId){
    $subscribe = self::findOne(['lykke_user_id' => $postId, 'lykke_user_id' => Yii::$app->user->id]);
    if (empty($subscribe)) {
      $subscribe = new BlogCommentsSubscribe();
      $subscribe->lykke_user_id = Yii::$app->user->id;
      $subscribe->blog_post_id = $postId;
      $subscribe->subscribe = 1;
    }else{
      $subscribe->subscribe = 1;
    }
    return $subscribe->save() ? $subscribe : FALSE;
  }


  function unsubscribe($postId){
    $subscribe = self::findOne(['lykke_user_id' => $postId, 'lykke_user_id' => Yii::$app->user->id]);
    $subscribe->subscribe = 0;
    return $subscribe->save() ? $subscribe : FALSE;
  }

  function subscribeStatus($postId) {
    $subscribe = self::findOne(['lykke_user_id' => $postId, 'lykke_user_id' => Yii::$app->user->id]);
    return $subscribe->subscribe;
  }

  function getSubscribers($postId){

    return  (new Query)->select("lu.first_name,
                    lu.email,
                    lu.last_name,
                    sub.*")
      ->from(LykkeUser::tableName().' as lu')
      ->leftJoin(self::tableName().' sub', 'lu.id = sub.lykke_user_id')
      ->where("sub.blog_post_id = ".$postId." AND sub.lykke_user_id != ".Yii::$app->user->id)->createCommand()->queryAll();

  }


}