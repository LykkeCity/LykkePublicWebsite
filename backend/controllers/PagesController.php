<?php

namespace backend\controllers;

use common\models\SitePages;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii;

class PagesController extends Controller {

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
    return $this->render('index', ['pages' => SitePages::getListPages()]);
  }

  public function actionAdd() {

    $result = null;
    $page = null;

    if (Yii::$app->request->isPost) {
      $model = new SitePages();
      $page = $model->InsertOrUpdate(Yii::$app->request->post());
      $result = $page ? 'success' : 'error';
    }

    return $this->render('add', ['result'  => $result,
                                 'id'      => $page->id,
                                 'parents' => SitePages::find()->where(['parent' => ''])->all()
    ]);
  }

  public function actionEdit($id) {

    $result = null;

    if (empty($id))
      $this->redirect('index');

    if (Yii::$app->request->isPost){
      $model = new SitePages();
      $pageUpd = $model->InsertOrUpdate(Yii::$app->request->post(), Yii::$app->request->post('id'));
      $result = $pageUpd ? 'success' : 'error';
    }

    $page = SitePages::find()->where(['id' => $id])->asArray()->one();

    $route = explode('/', $page['route']);

    $page['controller'] = $route[0];
    $page['action'] = $route[1];

    if (empty($page))
      $this->redirect('index');


      return $this->render('edit', ['page' => $page, 'result'  => $result, 'parents' => SitePages::find()->where(['parent' => ''])->all()]);
  }

  public function actionDeleted ($id){
    $page = SitePages::findOne($id);
    $page->delete();
    
    $this->redirect('index');
  }

}
