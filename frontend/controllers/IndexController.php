<?php
namespace frontend\controllers;

use common\models\SitePages;
use yii;

class IndexController extends AppController
{

    function actionIndex()
    {
        Yii::$app->view->title = empty($this->page['title']) ? $this->page['name'] : $this->page['title'];
        Yii::$app->view->registerMetaTag([
            'name'    => 'description',
            'content' => $this->page['description'],
        ]);
        Yii::$app->view->registerMetaTag([
            'name'    => 'keywords',
            'content' => $this->page['keywords'],
        ]);

        return $this->render('index', [
            'page' => $this->page,
            'blocks' => $this->blocks
        ]);
    }

}