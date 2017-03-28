<?php
namespace frontend\widgets;

use backend\components\helpers\UrlHelper;
use common\models\SitePages;
use Yii;
use yii\base\Widget;

class SubMenu extends Widget {

    public $parentId;

    function run() {
        $currentUri = Yii::$app->request->getUrl();

        // Hardcoded for news posts pages
        if(stripos($currentUri, '/company/news/')!== false){
            $currentUri = 'company/news';
        }

        // Hardcoded for news posts pages
        if(stripos($currentUri, '/city/blog/')!== false){
            $currentUri = 'city/blog';
        }

        $page = SitePages::find()
            ->where(['url' => trim($currentUri, '/')])->one();
        $this->parentId = $page['parent'] == "" ? $page['id'] : $page['parent'];


        if (!empty($this->parentId)) {
            $subMenu = SitePages::find()->select(['name', 'url'])
                ->where(['parent' => $this->parentId, 'in_menu' => 1])->all();
            $currentUri = trim($currentUri, '/');
            MainMenu::$parentId = $this->parentId;
            return $this->render('SubMenu',
                compact('subMenu', 'currentUri'));
        }
        return;
    }

}