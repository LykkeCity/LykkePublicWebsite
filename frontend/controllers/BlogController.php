<?php


namespace frontend\controllers;


use common\models\SitePages;
use common\models\BlogPosts;
use Yii;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class BlogController extends AppController{


  public function actions()
  {
    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ]
    ];
  }


  public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
  }


  function actionIndex ($post_url = "") {
    //TODO - костыль, потом убрать
    $uri = explode('/', ltrim(Yii::$app->request->getUrl(), '/'));
    $uri = $uri[0].'/'.$uri[1];

    $page = SitePages::find()->where(['url' => $uri])->one();

    if (empty($post_url)){

      $this->processPageRequest('page');

      $posts = BlogPosts::find()->where(['published' => 1])->orderBy(['post_datetime' => SORT_DESC]);
      $countQuery = clone $posts;
      
      $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10, 'validatePage' => false]);
      $pages->pageSizeParam = false;

      $posts = $posts->offset($pages->offset)
        ->limit($pages->limit)
        ->all();


      if (Yii::$app->request->isAjax){
        return $this->renderPartial('partialBlogItem', ['page' => $page, 'posts' => $posts]);
      }

      return $this->render('index', ['page' => $page, 'posts' => $posts, 'pages' => $pages]);

    }else{

      $post = BlogPosts::find()->where(['published' => 1, 'post_url' => $post_url])->one();

      if (empty($post))
        throw new NotFoundHttpException();


      return $this->render('post', ['page' => $page, 'post' => $post]);

    }

  }

}