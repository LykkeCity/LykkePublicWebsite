<?php
namespace frontend\widgets;

use backend\components\helpers\UrlHelper;
use common\models\SitePages;
use yii\base\Widget;

class SubMenu extends Widget
{

    public $parentId;
    public $backUrl;

    function run()
    {
        if (!empty($this->parentId)) {
            $subMenu = SitePages::find()->select(['name', 'url'])
                ->where(['parent' => $this->parentId, 'in_menu' => 1])->all();
            $currentUri = ltrim(UrlHelper::to(), '/');
            MainMenu::$parentId = $this->parentId;
            $backUrl = $this->backUrl;

            return $this->render('SubMenu',
                compact('subMenu', 'currentUri', 'backUrl'));
        }
    }

}