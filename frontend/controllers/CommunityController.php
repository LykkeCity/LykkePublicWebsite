<?php
namespace frontend\controllers;

use yii;
use common\models\NewsPosts;

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

        $url = "https://public-api.lykke.com/api/AssetPairs/rate/LKKUSD";
        $response = $this->cUrl($url, '', 'GET');
        $lkkAsk = $response->{'ask'};
        $lkkBid = $response->{'bid'};
        $lkkPrice = ($lkkAsk+$lkkBid)/2;

        $url = "https://public-api.lykke.com/api/Company/ownershipStructure";
        $response = $this->cUrl($url, '', 'GET');
        $totalSupply = $response->{'totalLykkeCoins'};
        $treasureCoins = $response->{'treasuryCoins'};

        $marketCapitalization = ($totalSupply - $treasureCoins) * $lkkPrice;

        $posts = NewsPosts::find()->where(['published' => 1])
            ->orderBy(['post_datetime' => SORT_DESC])->limit(2)->all();

        $wallets = 18900;

        $holders = 3941;

        return $this->render('invest', [
            'posts' => $posts,
            'wallets' => number_format($wallets),
            'holders' => number_format($holders),
            'capitalization' => number_format($dateCapitalization->{'amount'}),
            'totalLykkeCoins' => number_format($ownershipStructure->{'totalLykkeCoins'}),
            'privateWalletsCoins' => number_format($ownershipStructure->{'privateWalletsCoins'}),
            'tradingWalletsCoins' => number_format($ownershipStructure->{'tradingWalletsCoins'}),
            'treasuryCoins' => number_format($ownershipStructure->{'treasuryCoins'}),
            'marketCapitalization' => number_format($marketCapitalization)
        ]);
    }
}