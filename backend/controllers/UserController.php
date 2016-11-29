<?php


namespace backend\controllers;

use backend\models\UpdateUserForm;
use common\models\User;
use backend\models\SignupUserForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;

class UserController  extends  Controller{

  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'rules' => [
          [
            'actions' => ['index', 'add', 'edit', 'deleted'],
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
          'deleted' => ['post', 'get'],
        ],
      ],
    ];
  }


  function actionIndex(){


    $users = User::find()->select(['id', 'firstname', 'lastname'])->asArray()->all();

    return $this->render('index', [
      'users' => $users,
    ]);


  }

  function actionAdd () {

    $model = new SignupUserForm();
    if ($model->load(Yii::$app->request->post())) {
      if ($user = $model->signup()) {
        if (Yii::$app->getUser()->login($user)) {
          return $this->redirect('index');
        }
      }
    }



    return $this->render('add', [
      'model' => $model,
    ]);

  }

  function actionEdit ($id){
    $modelUser = new User();
    $model = new UpdateUserForm();

    if ($model->load(Yii::$app->request->post())) {
        $result =  $model->upadate($id) ? 'success' : 'error';
    }
    
    return $this->render('edit', ['result' => $result, 'model' => $model, 'user' => $modelUser->find()->where(['id'=>$id])->asArray()->one()]);
  }

  public function actionDeleted ($id){
    $user = User::findOne($id);
    $user->delete();

    $this->redirect('index');
  }

}