<?php

namespace backend\controllers;


use common\models\Asset;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii;

class AssetController extends AppController {

  public function behaviors() {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'only'  => ['index'],
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
          'index' => ['post', 'get'],
          'delete' => ['post', 'get']
        ],
      ],
    ];
  }

  public function beforeAction($action) {
    $this->enableCsrfValidation = FALSE;
    return parent::beforeAction($action);
  }

  function actionIndex() {

    $model = new Asset();

    if (Yii::$app->request->isPost) {
      $model->add(Yii::$app->request->post());
    }

    $asset = $model::find()->asArray()->all();
    return $this->render('index', ['asset' => $asset]);
  }


  public function actionDeleted ($id){
    $asset = Asset::findOne($id);
    $asset->delete();
    $this->redirect('index');
  }


}