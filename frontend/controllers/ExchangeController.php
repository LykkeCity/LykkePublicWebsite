<?php
namespace frontend\controllers;

use common\models\Asset;
use common\models\SitePages;
use Yii;
use yii\web\View;

class ExchangeController extends AppController
{

    public function actionIndex() {
        $assets = Asset::find()->asArray()->all();
        return $this->render("index", [
            'assets' => $assets
        ]);
    }

    public function actionRulebook() {
        return $this->render('rulebook');
    }

    public function actionTerms() {
        return $this->render('terms');
    }

    public function actionAdvancedChart() {
        Yii::$app->view->registerJsFile('/js/vendor/tv-charts/charting_library.min.js', [
            'position' => View::POS_END,
            'depends'  => 'frontend\assets\MainAsset',
        ]);
        Yii::$app->view->registerJsFile('/js/exchange/datafeed/datafeed.js', [
            'position' => View::POS_END,
            'depends'  => 'frontend\assets\MainAsset',
        ]);
        Yii::$app->view->registerJsFile('/js/exchange/advanced-chart.js', [
            'position' => View::POS_END,
            'depends'  => 'frontend\assets\MainAsset',
        ]);
        Yii::$app->view->registerCssFile('/css/exchange/advanced-chart.css', [
            'position' => View::POS_END,
            'depends'  => 'frontend\assets\MainAsset',
        ]);

        return $this->render('advanced-chart');
    }

}