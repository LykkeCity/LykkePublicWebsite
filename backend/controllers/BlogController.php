<?php
/**
 * Created by PhpStorm.
 * User: Arkadiy
 * Date: 28.11.2016
 * Time: 15:13
 */

namespace backend\controllers;


use common\models\BlogPosts;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\data\Pagination;
use yii;


class BlogController extends Controller{

  public function behaviors() {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'only'  => ['index', 'add', 'edit'],
        'rules' => [
          [
            'actions' => ['index', 'add', 'edit'],
            'allow'   => TRUE,
            'roles'   => ['@'],
          ],
        ],
      ],
      'verbs'  => [
        'class'   => VerbFilter::className(),
        'actions' => [
          'add'  => ['post', 'get'],
          'edit' => ['post', 'get'],
        ],
      ],
    ];
  }

  public function beforeAction($action) {
    $this->enableCsrfValidation = FALSE;
    return parent::beforeAction($action);
  }


  public function actionIndex() {
   $posts = BlogPosts::find()->orderBy(['id' => SORT_DESC]);

    $countQuery = clone $posts;

    $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);

    $pages->pageSizeParam = false;
    $pages->forcePageParam = false;

    $posts = $posts->offset($pages->offset)
      ->limit($pages->limit)
      ->all();

    return $this->render('index', ['posts' => $posts,  'pages' => $pages]);
  }

  public function actionAdd() {

    $result = null;
    $blogPostId = null;

    if (Yii::$app->request->isPost) {
      $model = new BlogPosts();
      $blogPost = $model->InsertOrUpdate(Yii::$app->request->post());
      $result = $blogPost ? 'success' : 'error';
      $blogPostId = $blogPost->id;
    }

    return $this->render('add', ['result'  => $result, 'id' => $blogPostId]);
  }

  public function actionEdit($id) {

    $result = null;

    if (empty($id))
      $this->redirect('index');

    if (Yii::$app->request->isPost){
      $model = new BlogPosts();
      $postUpd = $model->InsertOrUpdate(Yii::$app->request->post(), Yii::$app->request->post('id'));
      $result = $postUpd ? 'success' : 'error';
    }

    $post = BlogPosts::find()->where(['id'=>$id])->one();

    if (empty($post))
      $this->redirect('index');

    return $this->render('edit', ['post' => $post, 'result' => $result]);
  }


  public function actionDeleted ($id){
    $post = BlogPosts::findOne($id);
    $post->delete();

    $this->redirect('index');
  }


}