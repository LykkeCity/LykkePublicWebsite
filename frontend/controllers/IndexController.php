<?php
namespace frontend\controllers;

use common\models\SitePages;
use yii;

class IndexController extends AppController
{

    function actionIndex()
    {
        $page = SitePages::find()->where(['url' => '/'])->one();
        $this->pageId = $page['id'];
        Yii::$app->view->title = empty($page['title']) ? $page['name']
            : $page['title'];
        Yii::$app->view->registerMetaTag([
            'name'    => 'description',
            'content' => $page['description'],
        ]);
        Yii::$app->view->registerMetaTag([
            'name'    => 'keywords',
            'content' => $page['keywords'],
        ]);

        return $this->render('index', ['page' => $page]);
    }

}