<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\data\SqlDataProvider;


class BlogCommentsEditedHistory extends ActiveRecord {

  public static function tableName() {
    return 'blog_comments_edited_history';
  }

  public static function add($postId, $commentId, $comment) {
    $history = new BlogCommentsEditedHistory();

    $history->blog_post_id = $postId;
    $history->blog_comments_id = $commentId;
    $history->lykke_user_id = Yii::$app->user->id;
    $history->comment = $comment;
    $history->datetime = date('Y-m-d H:i:s');

    return $history->save() ? $history : FALSE;
  }

}