<?php
namespace frontend\controllers;

use common\models\SitePages;
use yii;

class IndexController extends AppController
{

    function actionIndex()
    {
        return $this->render('index');
    }

}