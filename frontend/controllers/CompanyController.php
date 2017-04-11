<?php
namespace frontend\controllers;

use common\models\ContentBlock;
use common\models\SitePages;
use yii;

class CompanyController extends AppController {

    function actionIndex() {
        Yii::$app->view->title = "Company";
        return $this->render('index');
    }

    function actionContacts() {


        Yii::$app->view->title = "Contacts";
        return $this->render('contacts', [
            'blocks' => $blocks,
            'page' => $this->page
        ]);
    }

    function actionTechnology() {
        Yii::$app->view->title = "Technology";
        return $this->render('technology');
    }

}