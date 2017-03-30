<?php
namespace frontend\controllers;

use common\models\SitePages;
use yii;

class B2bController extends AppController
{

    function actionIndex()
    {
        return $this->render('index');
    }

    function actionDeploy(){
        return $this->render('deploy');
    }

    function actionJoin(){
        return $this->render('join');
    }

    function actionThanks(){
        return $this->render('thanks');
    }

}