<?php


namespace frontend\controllers;


use common\models\BlogCommentsSubscribe;
use common\models\LykkeUser;
use common\models\SitePages;
use common\models\BlogPosts;
use common\models\BlogPostComments;
use Yii;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use yii\web\View;

class BlogController extends AppController {


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


  function actionIndex($post_url = "") {

    Yii::$app->view->registerJsFile('/js/blog.js', [
      'position' => View::POS_END,
      'depends'  => 'frontend\assets\MainAsset'
    ]);

    //TODO - костыль, потом убрать
    $uri = explode('/', ltrim(Yii::$app->request->getUrl(), '/'));
    $uri = $uri[0] . '/' . $uri[1];

    $page = SitePages::find()->where(['url' => $uri])->one();

    return empty($post_url) ? $this->allPost($page) : $this->detailsPost($page, $post_url);


  }

  function actionComment() {
    $comment = new BlogPostComments();
    $newComment = $comment->newComment(Yii::$app->request->post());

    if ($newComment !== FALSE) {
      $newComment['first_name'] = Yii::$app->user->identity->first_name;
      $newComment['last_name'] = Yii::$app->user->identity->last_name;
      $isReplyComment = $newComment['reply_comment_id'] == NULL ? FALSE : TRUE;


      $idAuthor = BlogPosts::AuthorId(Yii::$app->request->post('blog_post_id'));
      $this->sendNotificationsNewComments(Yii::$app->request->post('blog_post_id'));

      return $this->renderPartial('partial_comment_item', [
        'comment'        => $newComment,
        'idAuthor'       => $idAuthor,
        'idPost'         => Yii::$app->request->post('blog_post_id'),
        'isReplyComment' => $isReplyComment
      ]);
    }

    return 'error';
  }


  function allPost($page) {

    $this->processPageRequest('page');

    $posts = BlogPosts::find()
      ->where(['published' => 1])
      ->orderBy(['post_datetime' => SORT_DESC]);

    $countQuery = clone $posts;

    $pages = new Pagination([
      'totalCount'   => $countQuery->count(),
      'pageSize'     => 10,
      'validatePage' => FALSE
    ]);
    $pages->pageSizeParam = FALSE;

    $posts = $posts->offset($pages->offset)
      ->limit($pages->limit)
      ->all();


    if (Yii::$app->request->isAjax) {
      return $this->renderPartial('partial_blog_item', [
        'page'  => $page,
        'posts' => $posts
      ]);
    }

    return $this->render('index', [
      'page'  => $page,
      'posts' => $posts,
      'pages' => $pages
    ]);


  }


  function detailsPost($page, $post_url) {
    $post = BlogPosts::find()->where([
      'published' => 1,
      'post_url'  => $post_url
    ])->one();


    if (empty($post)) {
      throw new NotFoundHttpException();
    }

    $comment = new BlogPostComments();
    $subscribe = new BlogCommentsSubscribe();

    $comments = $comment->getCommetnsPost($post['id']);
    $subscribeStatus = $subscribe->subscribeStatus($post['id']);

    return $this->render('post', [
      'page'          => $page,
      'subscribe'     => $subscribeStatus,
      'post'          => $post,
      'comments'      => $comments['comments'],
      'countComments' => $comments['count']
    ]);
  }

  function actionShowMoreComments() {

    $comment = new BlogPostComments();
    $comments = $comment->getCommetnsPost(Yii::$app->request->post('id'), Yii::$app->request->post('page'));

    $idAuthor = BlogPosts::AuthorId(Yii::$app->request->post('id'));

    return $this->renderPartial('partial_comments', [
      'comments' => $comments['comments'],
      'idAuthor' => $idAuthor,
      'idPost'   => Yii::$app->request->post('id')
    ]);

  }

  function actionDeleteComment() {
    $AuthorCommentId = BlogPostComments::AuthorCommentId(Yii::$app->request->post('id'));

    if (Yii::$app->request->isAjax && Yii::$app->userAccess->access('edit_frontent') == 1 || $AuthorCommentId == Yii::$app->user->id) {
      $comment = new BlogPostComments();
      $comment->deleteComment(Yii::$app->request->post('id'));
    }

  }

  function actionSpamComment() {

    if (Yii::$app->request->isAjax) {
      $comment = new BlogPostComments();
      $comment->spamComment(Yii::$app->request->post('id'));
    }

  }

  function actionEditComment() {
    $AuthorCommentId = BlogPostComments::AuthorCommentId(Yii::$app->request->post('comment_id'));

    if (Yii::$app->request->isAjax && $AuthorCommentId == Yii::$app->user->id) {
      $comment = new BlogPostComments();
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
      $subscribe = new BlogCommentsSubscribe();
      $res = $subscribe->subscribe(Yii::$app->request->post('id'));
      return $res != FALSE ?: 'error';
    }
  }

  function actionUnsubscribeComment() {
    if (Yii::$app->request->isAjax) {
      $subscribe = new BlogCommentsSubscribe();
      $res = $subscribe->unsubscribe(Yii::$app->request->post('id'));
      return $res != FALSE ?: 'error';
    }
  }


  function sendNotificationsNewComments($postId) {
    $subscribe = new BlogCommentsSubscribe();
    $subscribes = $subscribe->getSubscribers($postId);

    foreach ($subscribes as $subscriber) {
      Yii::$app->mailer->compose()
        ->setFrom('Arkasha-94@mail.ru')
        ->setTo($subscriber['email'])
        ->setSubject('Тема сообщения')
        ->setHtmlBody('<b>Новый комментарий</b>')
        ->send();
    }

  }


}