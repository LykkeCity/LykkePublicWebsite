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

  function newComment($post) {

    $comment = new BlogPostComments();

    $comment->comment = $post['comment'];
    $comment->lykke_user_id = Yii::$app->user->id;
    $comment->blog_post_id = $post['blog_post_id'];
    $comment->reply_comment_id = $post['reply_comment_id'];
    $comment->date = date('Y-m-d H:i:s');

    return $comment->save() ? $comment : FALSE;

  }

  function editComment($post) {

    $comment = self::findOne(['blog_post_id'  => $post['blog_post_id'],
                              'id'            => $post['comment_id'],
                              'lykke_user_id' => Yii::$app->user->id
    ]);
    
    BlogCommentsEditedHistory::add($comment->blog_post_id, $comment->id, $comment->comment);

    $comment->comment = $post['comment'];
    $comment->edited = 1;

    return $comment->save() ? $comment->comment : FALSE;

  }


  function sqlCommentsPost($id, $id_reply = NULL) {

    $whereReply = $id_reply == NULL ? 'IS NULL' : "= " . $id_reply;
    $order = $id_reply == NULL ? 'DESC' : 'ASC';

    return (new Query)->select("lu.first_name,
                    lu.last_name,
                    bp.*")
      ->from(LykkeUser::tableName() . ' as lu')
      ->leftJoin(BlogPostComments::tableName() . ' bp', 'lu.id = bp.lykke_user_id')
      ->where("bp.blog_post_id = " . $id . " AND reply_comment_id " . $whereReply)
      ->orderBy('date ' . $order)
      ->createCommand();
  }


  function getCommetnsPost($id, $page = 0) {

    $sql = $this->sqlCommentsPost($id)->sql;

    $count = (new Query())->select('COUNT(*)')
      ->from(BlogPostComments::tableName())
      ->where("blog_post_id = " . $id . " AND reply_comment_id IS NULL")
      ->createCommand()
      ->queryOne();

    $provider = new SqlDataProvider([
      'sql'        => $sql,
      'totalCount' => $count,
      'pagination' => [
        'pageSize' => 5,
        'page'     => $page
      ]
    ]);

    $comments['comments'] = $provider->getModels();

    $comments['count'] = $count['COUNT(*)'];

    foreach ($comments['comments'] as $key => $comment) {
      $replyComments = $this->sqlCommentsPost($id, $comment['id'])->queryAll();
      $comments['count'] += count($replyComments);
      $comments['comments'][$key]['reply_comment'] = $replyComments;
    }

    return $comments;

  }

  function deleteComment($id) {
    $comment = self::findOne($id);
    $comment->deleted = 1;
    return $comment->save() ? $comment : FALSE;
  }

  function spamComment($id) {
    $comment = self::findOne($id);
    $comment->spam = $comment->spam + 1;
    return $comment->save() ? $comment : FALSE;
  }

  public static function AuthorCommentId($id) {
    return self::findOne(['id' => $id])->lykke_user_id;
  }


}