<?php
namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use yii\web\View;

class Frontend_Admin extends Widget
{

    public function run()
    {
        if (!Yii::$app->user->isGuest
            && Yii::$app->userAccess->access('edit_frontent') == 1
        ) {
            Yii::$app->view->registerCssFile('/css/frontend-admin.css');
            Yii::$app->view->registerJsFile('/js/frontend-admin.js', [
                'position' => View::POS_END,
                'depends'  => 'frontend\assets\MainAsset',
            ]);

            return $this->render('Frontend_Admin');
        }
    }

}