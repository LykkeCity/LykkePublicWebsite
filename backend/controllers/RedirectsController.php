<?php

namespace backend\controllers;

use common\models\Redirects;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii;

class RedirectsController extends AppController {

  public function behaviors() {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'only'  => ['index', 'delete'],
        'rules' => [
          [
            'actions' => ['index', 'delete'],
            'allow'   => TRUE,
            'roles'   => ['@'],
          ],
        ],
      ],
      'verbs'  => [
        'class'   => VerbFilter::className(),
        'actions' => [
          'add'    => ['post', 'get'],
          'delete' => ['post', 'get'],
        ],
      ],
    ];
  }

  public function beforeAction($action) {
    $this->enableCsrfValidation = FALSE;
    return parent::beforeAction($action);
  }


  function actionIndex() {
    $model = new Redirects();

    if (Yii::$app->request->isPost) {
      $model->addRedirect(Yii::$app->request->post());
    }

    $redirects = $model->getAllRedirect();

    return $this->render('index', ['redirects' => $redirects]);
  }

  function actionDelete($id) {
    (new Redirects())->deleteRedirect($id);
    $this->redirect('index');
  }


}