<?php
namespace frontend\controllers;

use common\models\SitePages;
use yii;

class B2bController extends AppController {

    function actionIndex() {
        Yii::$app->view->title = "B2B";
        return $this->render('index');
    }

    function actionDeploy() {
        Yii::$app->view->title = "Deploy Blockchain Projects";
        return $this->render('deploy');
    }

    function actionJoin() {
        Yii::$app->view->title = "Join as Blockchain Accelerator";
        return $this->render('join');
    }

    function actionThanks() {
        Yii::$app->view->title = "Thank you for getting in touch!";
        return $this->render('thanks');
    }

}