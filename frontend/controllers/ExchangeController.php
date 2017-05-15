<?php
namespace frontend\controllers;

use common\models\Asset;
use common\models\SitePages;
use Yii;
use yii\web\View;

class ExchangeController extends AppController {

    public function actionIndex() {
        $assets = Asset::find()->asArray()->all();

        Yii::$app->view->registerJsFile('/js/vendor/tv-charts/charting_library.min.js', [
            'position' => View::POS_BEGIN
        ]);

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
            'position' => View::POS_BEGIN
        ]);

        return $this->render('advanced-chart');
    }
}