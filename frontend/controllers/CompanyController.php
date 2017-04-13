<?php
namespace frontend\controllers;

use yii;

class CompanyController extends AppController {

    function actionIndex() {
        Yii::$app->view->title = "Company";
        return $this->render('index');
    }

    function actionContacts() {

        Yii::$app->view->title = "Contacts";
        return $this->render('contacts');
    }

    function actionTechnology() {
        Yii::$app->view->title = "Technology";
        return $this->render('technology');
    }

}