<?php
use common\models\SitePages;
use yii\db\Migration;

class m170504_105125_add_advanced_chart_page extends Migration {

    public function safeUp() {
        $page = new SitePages();
        $page->name = 'Advanced Chart';
        $page->url = 'exchange/advanced-chart';
        $page->content = '';
        $page->parent = 2;
        $page->datetime = date("Y-m-d H:i:s", time());
        $page->title = '';
        $page->keywords = '';
        $page->description = '';
        $page->author = 0;
        $page->route = 'exchange/advanced-chart';
        $page->published = true;
        $page->in_menu = true;
        $page->template = 'embedded';
        $page->normal_tpl = true;
        $page->save();
    }

    public function safeDown() {
        $page = SitePages::findOne([
            'url' => 'exchange/advanced-chart'
        ]);
        $page->delete();
    }
}
