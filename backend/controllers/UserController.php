<?php

namespace backend\controllers;

use common\models\LykkeUser;
use common\models\LykkeUserAccess;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class UserController extends AppController
{

  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'rules' => [
          [
            'actions' => [
              'index', 'admin', 'frontend', 'notify-spam', 'blocked-comment'
            ],
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'admin' => ['post', 'get'],
          'frontend' => ['post', 'get'],
          'notify-spam' => ['post', 'get'],
          'blocked-comment' => ['post', 'get'],
        ],
      ],
    ];
  }


  function actionIndex()
  {
    $users = LykkeUser::getAll();

    return $this->render(
      'index', [
        'users' => $users,
      ]
    );
  }

  function actionAdmin()
  {

    if (Yii::$app->request->isAjax) {
      $access = new LykkeUserAccess();
      return $access->admin(Yii::$app->request->post());
    }

    return false;

  }

  function actionFrontend()
  {

    if (Yii::$app->request->isAjax) {
      $access = new LykkeUserAccess();
      return $access->Frontend(Yii::$app->request->post());
    }

    return false;

  }


  function actionNotifySpam()
  {
    if (Yii::$app->request->isAjax) {
      $user = new LykkeUser();
      return $user->notifySpam(Yii::$app->request->post());
    }
    return false;
  }

  function actionBlockedComment()
  {
    if (Yii::$app->request->isAjax) {
      $user = new LykkeUser();
      return $user->blockedComment(Yii::$app->request->post());
    }
    return false;
  }


}