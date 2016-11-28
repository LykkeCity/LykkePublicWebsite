<?php


namespace frontend\controllers;


use common\models\SitePages;
use common\models\BlogPosts;
use frontend\widgets\SubMenu;
use Yii;
class BlogController extends AppController{


  function actionIndex ($post_url = "") {
    //костыль, потом убрать
    $uri = explode('/', ltrim(Yii::$app->request->getUrl(), '/'));
    $uri = $uri[0].'/'.$uri[1];

    $page = SitePages::find()->where(['url' => $uri])->one();

    if (empty($post_url)){

      $posts = BlogPosts::find()->where(['published' => 1])->orderBy(['post_datetime' => SORT_DESC])->all();
      return $this->render('index', ['page' => $page, 'posts' => $posts]);

    }else{

      $post = BlogPosts::find()->where(['published' => 1, 'post_url' => $post_url])->one();

      if (empty($post))
        Yii::$app->response->redirect('/city/blog');
      

      return $this->render('post', ['page' => $page, 'post' => $post]);

    }

  }

}