<?php

namespace backend\controllers;


use common\models\Asset;
use common\models\AssetPair;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii;

class AssetController  extends Controller{

  public function behaviors() {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'only'  => ['index', 'add', 'edit', 'pair', 'deletedAssetPair'],
        'rules' => [
          [
            'actions' => ['index', 'add', 'edit', 'pair', 'deletedAssetPair'],
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
          'deletedAssetPair' => ['post', 'get'],
        ],
      ],
    ];
  }

  public function beforeAction($action) {
    $this->enableCsrfValidation = FALSE;
    return parent::beforeAction($action);
  }

  function actionIndex(){
    $assets = Asset::find()->all();
    return $this->render('index', ['assets' => $assets]);
  }

  function actionAdd(){

    $result = null;
    $assetId = null;

    if (Yii::$app->request->isPost) {
      $model = new Asset();
      $asset = $model->InsertOrUpdate(Yii::$app->request->post());
      $result = $asset ? 'success' : 'error';
      $assetId = $asset->id;
    }

    return $this->render('add', ['result'  => $result, 'id' => $assetId]);
  }

  function actionEdit($id){
    $result = null;

    if (empty($id))
      $this->redirect('index');

    if (Yii::$app->request->isPost){
      $model = new Asset();
      $assetUpd = $model->InsertOrUpdate(Yii::$app->request->post(), Yii::$app->request->post('id'));
      $result = $assetUpd ? 'success' : 'error';
    }

    $asset = Asset::find()->where(['id'=>$id])->one();

    if (empty($asset))
      $this->redirect('index');

    return $this->render('edit', ['asset' => $asset, 'result' => $result]);
  }

  public function actionDeleted ($id){
    $asset = Asset::findOne($id);
    $asset->delete();

    $this->redirect('index');
  }

  public function actionPair(){

    $result = null;

    $model = new AssetPair();

    if (Yii::$app->request->isPost ){
      $assetPair = $model->InsertPair(Yii::$app->request->post());
      $result = $assetPair ? 'success' : 'error';
    }

    $assets = Asset::find()->all();

    return $this->render('index', ['assets' => $assets, 'assetPairs' =>  $model->GetAssetPairs() ,'result' => $result]);
  }

  public function actionDeletedAssetPair ($id){
    $assetPair = AssetPair::findOne($id);
    $assetPair->delete();

    $this->redirect('pair');
  }


}