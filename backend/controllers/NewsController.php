<?php

namespace backend\controllers;

use common\models\NewsPosts;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\data\Pagination;
use yii;

class NewsController extends AppController {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'add', 'edit'],
                'rules' => [
                    [
                        'actions' => ['index', 'add', 'edit'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'add' => ['post', 'get'],
                    'edit' => ['post', 'get'],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex() {
        $posts = NewsPosts::find()->orderBy(['id' => SORT_DESC]);
        $countQuery = clone $posts;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 20,
        ]);
        $pages->pageSizeParam = false;
        $pages->forcePageParam = false;
        $posts = $posts->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', ['posts' => $posts, 'pages' => $pages]);
    }

    public function actionAdd() {
        $result = null;
        $newsPostId = null;
        if (Yii::$app->request->isPost) {
            $model = new NewsPosts();
            $newsPost = $model->InsertOrUpdate(Yii::$app->request->post());
            $result = $newsPost ? 'success' : 'error';
            $newsPostId = $newsPost->id;
        }
        return $this->render('add', ['result' => $result, 'id' => $newsPostId]);
    }

    public function actionEdit($id) {
        $result = null;
        if (empty($id)) {
            $this->redirect('index');
        }
        if (Yii::$app->request->isPost) {
            $model = new NewsPosts();
            $postUpd = $model->InsertOrUpdate(Yii::$app->request->post(),
                Yii::$app->request->post('id'));
            $result = $postUpd ? 'success' : 'error';
        }
        $post = NewsPosts::find()->where(['id' => $id])->one();
        if (empty($post)) {
            $this->redirect('index');
        }
        return $this->render('edit', ['post' => $post, 'result' => $result]);
    }

    public function actionDeleted($id) {
        $post = NewsPosts::findOne($id);
        $post->delete();
        $this->redirect('index');
    }

}