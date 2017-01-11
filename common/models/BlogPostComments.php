<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\data\SqlDataProvider;


class BlogPostComments extends ActiveRecord {

  public $first_name;
  public $last_name;

  public static function tableName() {
    return 'blog_comments';
  }

  function newComment($post){

    $comment = new BlogPostComments();

    $comment->comment = $post['comment'];
    $comment->lykke_user_id = Yii::$app->user->id;
    $comment->blog_post_id = $post['blog_post_id'];
    $comment->reply_comment_id = $post['reply_comment_id'];
    $comment->date = date('Y-m-d H:i:s');

    return $comment->save() ? $comment : FALSE;

  }

  function getCommetnsPost($id, $page = 0){

    $sql = (new Query)->select("lu.first_name,
                    lu.last_name,
                    bp.comment,
                    bp.id,
                    bp.lykke_user_id,
                    bp.date")
      ->from(LykkeUser::tableName().' as lu')
      ->leftJoin(BlogPostComments::tableName().' bp', 'lu.id = bp.lykke_user_id')
      ->where("bp.blog_post_id = ".$id)->orderBy('date DESC')->createCommand()->sql;

    $count = (new Query())->select('COUNT(*)')->from(BlogPostComments::tableName())->where("blog_post_id = ".$id)->createCommand()->queryOne();

    $provider = new SqlDataProvider([
      'sql' => $sql,
      'totalCount' => $count,
      'pagination' => [
        'pageSize' => 5,
        'page' => $page
      ]
    ]);

    return $provider->getModels();

  }

  function deleteComment($id){
    $comment = self::findOne($id);
    $comment->delete();
  }


}