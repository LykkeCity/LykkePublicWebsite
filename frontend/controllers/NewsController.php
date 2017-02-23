<?php


namespace frontend\controllers;


use common\enum\CommentsType;
use common\models\SitePages;
use common\models\NewsPosts;
use common\models\Comments;
use common\models\CommentsSubscribe;

use Yii;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use yii\web\View;

class NewsController extends AppController {


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

    Yii::$app->view->registerJsFile('/js/load_post.js', [
      'position' => View::POS_END,
      'depends'  => 'frontend\assets\MainAsset'
    ]);

    //TODO - костыль, потом убрать
    $uri = explode('/', ltrim(Yii::$app->request->getUrl(), '/'));
    $uri = $uri[0] . '/' . $uri[1];

    $page = SitePages::find()->where(['url' => $uri])->one();

    return empty($post_url) ? $this->allPost($page) : $this->detailsPost($page, $post_url);


  }


  function allPost($page) {

    $this->processPageRequest('page');

    $posts = NewsPosts::find()
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
      return $this->renderPartial('partial_news_item', [
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
    $post = NewsPosts::find()->where([
      'published' => 1,
      'post_url'  => $post_url
    ])->one();


    if (empty($post)) {
      throw new NotFoundHttpException();
    }

    $comment = new Comments();
    $subscribe = new CommentsSubscribe();

    $comments = $comment->getComments($post['id'], CommentsType::NEWS);
    $subscribeStatus = $subscribe->subscribeStatus($post['id'], CommentsType::NEWS);

    return $this->render('post', [
      'page'          => $page,
      'subscribe'     => $subscribeStatus,
      'post'          => $post,
      'comments'      => $comments['comments'],
      'countComments' => $comments['count'],
      'type'          =>  CommentsType::NEWS
    ]);
  }


}