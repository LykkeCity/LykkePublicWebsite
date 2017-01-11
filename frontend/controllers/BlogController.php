<?php


namespace frontend\controllers;


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

      $idAuthor = BlogPosts::AuthorId(Yii::$app->request->post('blog_post_id'));

      return $this->renderPartial('partialCommentItem', ['comment' => $newComment, 'idAuthor' => $idAuthor]);
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
      return $this->renderPartial('partialBlogItem', [
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

    $comments = $comment->getCommetnsPost($post['id']);


    return $this->render('post', ['page' => $page, 'post' => $post, 'comments' => $comments]);
  }

  function actionShowMoreComments(){

    $comment = new BlogPostComments();
    $comments = $comment->getCommetnsPost(Yii::$app->request->post('id'), Yii::$app->request->post('page'));

    $idAuthor = BlogPosts::AuthorId(Yii::$app->request->post('id'));

    return $this->renderPartial('partialComments', ['comments' => $comments, 'idAuthor' => $idAuthor]);

  }

  function actionDeleteComment(){

    if (Yii::$app->request->isAjax && Yii::$app->userAccess->access('edit_frontent') == 1) {
      $comment = new BlogPostComments();
      $comment->deleteComment(Yii::$app->request->post('id'));
    }


  }

}