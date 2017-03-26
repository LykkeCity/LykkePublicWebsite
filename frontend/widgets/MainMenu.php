<?php
namespace frontend\widgets;

use backend\components\helpers\UrlHelper;
use common\models\SitePages;
use yii;
use yii\base\Widget;

class MainMenu extends Widget
{

    public static $parentId;

    function run()
    {
        $siteMenu = SitePages::getListPages(true);
        $currentUri = empty(self::$parentId) ? ltrim(UrlHelper::to(), '/')
            : $siteMenu[self::$parentId]['url'];

        return $this->render('MainMenu', compact('siteMenu', 'currentUri'));
    }

}