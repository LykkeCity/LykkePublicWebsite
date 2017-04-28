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

        $url = "https://lykke-public-api.azurewebsites.net/api/Market/capitalization/USD";
        $dateCapitalization = $this->cUrl($url, '', 'GET');

        $url = "https://lykke-public-api.azurewebsites.net/api/company/ownershipStructure";
        $ownershipStructure = $this->cUrl($url, '', 'GET');

        return $this->render('invest', [
            'capitalization' => number_format($dateCapitalization->{'amount'}),
            'totalLykkeCoins' => number_format($ownershipStructure->{'totalLykkeCoins'}),
            'privateWalletsCoins' => number_format($ownershipStructure->{'privateWalletsCoins'}),
            'tradingWalletsCoins' => number_format($ownershipStructure->{'tradingWalletsCoins'}),
            'treasuryCoins' => number_format($ownershipStructure->{'treasuryCoins'}),
        ]);
    }
}