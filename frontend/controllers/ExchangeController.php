<?php
namespace frontend\controllers;

use common\models\Asset;
use common\models\SitePages;
use Yii;

class ExchangeController extends AppController
{

    public function actionIndex()
    {
        $assets = Asset::find()->asArray()->all();
        return $this->render("index", [
            'assets' => $assets
        ]);
    }

    public function actionRulebook(){
        return $this->render('rulebook');
    }

    public function actionTerms(){
        return $this->render('terms');
    }

}