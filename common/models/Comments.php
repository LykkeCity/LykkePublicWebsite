<?php
namespace common\models;

use common\classes\CommentsTypeClass;
use common\enum\CommentsType;
use Yii;
use yii\data\Pagination;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\data\SqlDataProvider;


class Comments extends ActiveRecord {

  public $first_name;
  public $last_name;

  public static function tableName() {
    return 'comments';
  }

  function newComment($post, $type) {

    $comment = new Comments();

    $comment->comment = $post['comment'];
    $comment->lykke_user_id = Yii::$app->user->id;
    $comment->page_post_id = $post['page_post_id'];
    $comment->reply_comment_id = $post['reply_comment_id'];
    $comment->date = date('Y-m-d H:i:s');
    $comment->type = $type;

    return $comment->save() ? $comment : FALSE;

  }

  function editComment($post) {

    $comment = self::findOne([
      'page_post_id'  => $post['page_post_id'],
      'id'            => $post['comment_id'],
      'lykke_user_id' => Yii::$app->user->id,
      'type'          => $post['type']
    ]);

    CommentsEditedHistory::add($comment->page_post_id, $comment->id, $comment->comment, $post['type']);

    $comment->comment = $post['comment'];
    $comment->edited = 1;

    return $comment->save() ? $comment->comment : FALSE;

  }


  function sqlComments($id, $type, $id_reply = NULL) {

    $whereReply = $id_reply == NULL ? 'IS NULL' : "= " . $id_reply;
    $order = $id_reply == NULL ? 'DESC' : 'ASC';

    return (new Query)->select("lu.first_name,
                    lu.last_name,
                    bp.*")
      ->from(LykkeUser::tableName() . ' as lu')
      ->leftJoin(Comments::tableName() . ' bp', 'lu.id = bp.lykke_user_id')
      ->where("bp.page_post_id = " . $id . " AND reply_comment_id " . $whereReply . " AND type = '$type'")
      ->orderBy('date ' . $order)
      ->createCommand();
  }


  function getComments($id, $type, $page = 0) {

    $sql = $this->sqlComments($id, $type)->sql;

    $count = (new Query())->select('COUNT(*)')
      ->from(Comments::tableName())
      ->where("page_post_id = " . $id . " AND reply_comment_id IS NULL AND" . " type = '$type'")
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
      $replyComments = $this->sqlComments($id, $type, $comment['id'])
        ->queryAll();
      $comments['count'] += count($replyComments);
      $comments['comments'][$key]['reply_comment'] = $replyComments;
    }

    return $comments;

  }


  function getAllCommentsForBackOffice($type = CommentsType::BLOG) {

    $class = CommentsTypeClass::getClass($type);
    if (!$class) {
      return FALSE;
    }

    $sql = (new Query)->select("lu.first_name,
                    lu.last_name,
                    tp.*,
                    bp.*")
      ->from(LykkeUser::tableName() . ' as lu')
      ->leftJoin(Comments::tableName() . ' bp', 'lu.id = bp.lykke_user_id')
      ->leftJoin($class::tableName() . ' tp', 'bp.page_post_id = tp.id')
      ->where("bp.type = '$type'")
      ->orderBy('date DESC');

    $pages = new Pagination([
      'totalCount' => count($sql->createCommand()
        ->queryAll()),
      'pageSize'   => 10
    ]);

    $pages->pageSizeParam = FALSE;
    $pages->forcePageParam = FALSE;

    $comments = $sql->offset($pages->offset)
      ->limit($pages->limit)->createCommand()->queryAll();

    return $res = ['comments' => $comments, 'pages' => $pages];
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