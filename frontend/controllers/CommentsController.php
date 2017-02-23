<?php


namespace frontend\controllers;


use common\classes\CommentsTypeClass;
use common\classes\EmailNotifications;

use common\models\BlogPosts;
use common\models\Comments;
use common\models\CommentsSubscribe;
use common\models\LykkeUser;
use common\models\News;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\View;

class CommentsController extends AppController {


  public function actions() {
    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ]
    ];
  }


  public function beforeAction($action) {
    $this->enableCsrfValidation = FALSE;
    return parent::beforeAction($action);
  }

  function actionNewComment() {

    $type = Yii::$app->request->post('type');

    $class = CommentsTypeClass::getClass($type);
    if (!$class)
      return 'error';

    $comment = new Comments();
    $newComment = $comment->newComment(Yii::$app->request->post(), $type);

    if ($newComment !== FALSE) {
      $newComment['first_name'] = Yii::$app->user->identity->first_name;
      $newComment['last_name'] = Yii::$app->user->identity->last_name;
      $isReplyComment = $newComment['reply_comment_id'] == NULL ? FALSE : TRUE;


      $idAuthor = $class::AuthorId(Yii::$app->request->post('page_post_id'));
      $this->sendNotificationsNewComments(Yii::$app->request->post('page_post_id'), $newComment, $type);

      return $this->renderPartial('partial_comment_item', [
        'comment'        => $newComment,
        'idAuthor'       => $idAuthor,
        'idPage'         => Yii::$app->request->post('page_post_id'),
        'isReplyComment' => $isReplyComment,
        'type'           => $type
      ]);
    }

    return 'error';
  }


  function actionShowMoreComments() {

    $comment = new Comments();
    $comments = $comment->getComments(Yii::$app->request->post('id'), Yii::$app->request->post('type'), Yii::$app->request->post('page'));

    $idAuthor = BlogPosts::AuthorId(Yii::$app->request->post('id'));

    return $this->renderPartial('partial_comments', [
      'comments' => $comments['comments'],
      'idAuthor' => $idAuthor,
      'idPage'   => Yii::$app->request->post('id')
    ]);

  }

  function actionDeleteComment() {
    $AuthorCommentId = Comments::AuthorCommentId(Yii::$app->request->post('id'));

    if (Yii::$app->request->isAjax && Yii::$app->userAccess->access('edit_frontent') == 1 || $AuthorCommentId == Yii::$app->user->id) {
      $comment = new Comments();
      $comment->deleteComment(Yii::$app->request->post('id'));
    }

  }

  function actionSpamComment() {

    if (Yii::$app->request->isAjax) {
      $comment = new Comments();
      $comment->spamComment(Yii::$app->request->post('id'));
    }

  }

  function actionEditComment() {
    $AuthorCommentId = Comments::AuthorCommentId(Yii::$app->request->post('comment_id'));

    if (Yii::$app->request->isAjax && $AuthorCommentId == Yii::$app->user->id) {
      $comment = new Comments();
      $result = $comment->editComment(Yii::$app->request->post());
      return $result != FALSE ? $result : 'error';
    }
    return 'error';
  }

  function actionBlockedComment() {

    if (Yii::$app->request->isAjax && Yii::$app->userAccess->access('edit_frontent') == 1) {
      $userBlockedComment = new LykkeUser();
      $res = $userBlockedComment->userBlockedComment(Yii::$app->request->post('id'));
      return $res != FALSE ?: 'error';
    }
    return 'error';

  }

  function actionSubscribeComment() {
    if (Yii::$app->request->isAjax) {
      $subscribe = new CommentsSubscribe();
      $res = $subscribe->subscribe(Yii::$app->request->post('id'), Yii::$app->request->post('type'));
      return $res != FALSE ?: 'error';
    }
  }

  function actionUnsubscribeComment() {
    if (Yii::$app->request->isAjax) {
      $subscribe = new CommentsSubscribe();
      $res = $subscribe->unsubscribe(Yii::$app->request->post('id'), Yii::$app->request->post('type'));
      return $res != FALSE ?: 'error';
    }
  }


  function sendNotificationsNewComments($postId, $comment, $type) {

    $subscribe = new CommentsSubscribe();
    $emailNotifications = new EmailNotifications();

    $subscribes = $subscribe->getSubscribers($postId, $type);


    foreach ($subscribes as $subscriber) {
      $content = $emailNotifications->PrepareEmail($subscriber['email'], 'New comments at lykke.com', [
        '@[name]'             => $subscriber['first_name'],
        '@[post_title]'       => $subscriber['post_title'],
        '@[comment_author]'   => $comment['first_name'] . ' ' . $comment['last_name'],
        '@[date]'             => date("M d, g:i a", strtotime($comment['date'])),
        '@[comment_text]'     => \yii\helpers\StringHelper::truncate($comment['comment'], 358, '...'),
        '@[post_link]'        => Yii::$app->urlManager->hostInfo . '/'.Yii::$app->params['uri_'.$type].'/' . $subscriber['post_url'],
        '@[unsubscribe_link]' => Yii::$app->urlManager->hostInfo . '/'.Yii::$app->params['uri_'.$type].'/' . $subscriber['post_url'] . '#unsubscribe',
        '@[year]'             => date('Y'),
      ]);

      !$content ?: $emailNotifications->AddToEnqueues($content);
    }

  }


}