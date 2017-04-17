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
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $dateCapitalization = curl_exec($ch);
        curl_close ($ch);

        $dateCapitalization = json_decode($dateCapitalization);

        return $this->render('invest', [
            'capitalization' => number_format($dateCapitalization->{'amount'}),
        ]);
    }
}