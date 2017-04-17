<?php
namespace frontend\controllers;

use yii;

class CommunityController extends AppController   {

    function actionIndex() {
        Yii::$app->view->title = "Community";
        return $this->render('index');
    }

    function actionFaq() {
        Yii::$app->view->title = "FAQ";
        return $this->render('faq');
    }

    function actionOpenPositions() {
        Yii::$app->view->title = "Open positions";
        return $this->render('openPositions');
    }

    function actionLykkeTimes() {
        Yii::$app->view->title = "Lykke times";
        return $this->render('lykkeTimes');
    }
    
    function actionInvest() {
        Yii::$app->view->title = "Invest";

        $url = "https://lykke-public-api.azurewebsites.net/api/Market/capitalization/LKK";
        $dateCapitalization = $this->cUrl($url, '', 'GET');

        return $this->render('invest', [
            'capitalization' => number_format($dateCapitalization->{'amount'}),
        ]);
    }
}