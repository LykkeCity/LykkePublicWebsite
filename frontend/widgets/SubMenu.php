<?php
namespace frontend\widgets;

use backend\components\helpers\UrlHelper;
use common\models\SitePages;
use Yii;
use yii\base\Widget;

class SubMenu extends Widget {

    public $parentId;

    function run() {
        $page = SitePages::find()
            ->where(['url' => trim(Yii::$app->request->getUrl(), '/')])->one();
        $this->parentId = $page['parent'] == "" ? $page['id'] : $page['parent'];

        if (!empty($this->parentId)) {
            $subMenu = SitePages::find()->select(['name', 'url'])
                ->where(['parent' => $this->parentId, 'in_menu' => 1])->all();
            $currentUri = ltrim(UrlHelper::to(), '/');
            MainMenu::$parentId = $this->parentId;
//            $backUrl = $this->backUrl;
            return $this->render('SubMenu',
                compact('subMenu', 'currentUri'));
        }
        return;
    }

}