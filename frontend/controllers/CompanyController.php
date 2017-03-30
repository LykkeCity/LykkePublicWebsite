<?php
namespace frontend\controllers;

use common\models\SitePages;
use yii;

class CompanyController extends AppController
{

    function actionIndex()
    {
        return $this->render('index');
    }

    function actionContacts(){

        return $this->render('contacts');
    }

}