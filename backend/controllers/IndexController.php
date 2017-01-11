<?php


namespace backend\controllers;


use yii\filters\AccessControl;
use yii;

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