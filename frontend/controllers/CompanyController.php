<?php
namespace frontend\controllers;

use common\models\SitePages;
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

}