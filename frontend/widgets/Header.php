<?php
namespace frontend\widgets;

use backend\components\helpers\UrlHelper;
use common\models\SitePages;
use yii;
use yii\base\Widget;

class Header extends Widget
{

    public static $parentId;

    function run()
    {
        $siteMenu = SitePages::getListPages(true);
        $currentUri = empty(self::$parentId) ? ltrim(UrlHelper::to(), '/')
            : $siteMenu[self::$parentId]['url'];


        // Hardcoded for news posts pages
        if(stripos($currentUri, 'company/news/')!== false){
            $currentUri = 'community';
        }

        // Hardcoded for news posts pages
        if(stripos($currentUri, 'city/blog/')!== false){
            $currentUri = 'company';
        }

        return $this->render('Header', compact('siteMenu', 'currentUri'));
    }

}