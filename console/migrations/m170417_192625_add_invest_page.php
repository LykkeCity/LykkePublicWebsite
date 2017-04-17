<?php
use common\models\SitePages;
use yii\db\Migration;

class m170417_192625_add_invest_page extends Migration {

    public function safeUp() {
        $page = new SitePages();
        $page->content = '';
        $page->datetime = date("Y-m-d H:i:s", time());
        $page->parent = 8;
        $page->published = true;
        $page->keywords = '';
        $page->description = '';
        $page->author = 0;
        $page->route = 'pages/index';
        $page->in_menu = true;
        $page->template = 'embedded';
        $page->title = 'Invest';
        $page->name = 'Invest';
        $page->url = 'city/invest';
        $page->save();
    }

    public function safeDown() {
        $page = SitePages::findOne([
            'url' => 'city/invest'
        ]);
        $page->delete();
    }
}
