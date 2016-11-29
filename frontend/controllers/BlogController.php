<?php


namespace frontend\controllers;


use common\models\SitePages;
use common\models\BlogPosts;
use Yii;
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

  function actionIndex ($post_url = "") {
    //TODO - костыль, потом убрать
    $uri = explode('/', ltrim(Yii::$app->request->getUrl(), '/'));
    $uri = $uri[0].'/'.$uri[1];

    $page = SitePages::find()->where(['url' => $uri])->one();

    if (empty($post_url)){

      $posts = BlogPosts::find()->where(['published' => 1])->orderBy(['post_datetime' => SORT_DESC])->all();
      return $this->render('index', ['page' => $page, 'posts' => $posts]);

    }else{

      $post = BlogPosts::find()->where(['published' => 1, 'post_url' => $post_url])->one();

      if (empty($post))
        throw new NotFoundHttpException();


      return $this->render('post', ['page' => $page, 'post' => $post]);

    }

  }

}