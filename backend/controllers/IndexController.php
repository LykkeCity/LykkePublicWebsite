<?php


namespace backend\controllers;


use frontend\controllers\AppController;
use yii\filters\AccessControl;

class IndexController extends AppController{

  public function behaviors() {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'rules' => [
          [
            'actions' => ['index'],
            'allow' => true,
            'roles' => ['@']
          ]
        ]
      ]
    ];
  }

  public function actions()
  {
    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ],
    ];
  }


  function actionIndex () {

    return $this->render('index');
  }

}