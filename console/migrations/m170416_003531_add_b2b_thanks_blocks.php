<?php
use common\models\ContentBlock;
use common\models\SitePages;
use yii\db\Migration;

class m170416_003531_add_b2b_thanks_blocks extends Migration {

    public function safeUp() {
        $page = SitePages::findOne([
            'url' => 'b2b-thanks',
        ]);
        $block1 = new ContentBlock();
        $block1->pageId = $page->id;
        $block1->ordering = 1;
        $block1->name = 'Main';
        $block1->title = 'Thank you for getting in touch!';
        $block1->content = '
         <p>We appreciate you contacting us and will get back to you as soon
              as possible. In the meantime, you can check the <a
                  href="/city/faq">FAQ</a> section,
              learn more <a href="/company">about Lykke</a>,
              or browse through our latest <a href="/city/blog">blog posts</a>.
            </p>
        ';
        $block1->save();
    }

    public function safeDown() {
        $page = SitePages::findOne([
            'url' => 'b2b-thanks',
        ]);
        $blocks = ContentBlock::findAll([
            'pageId' => $page->id,
        ]);
        foreach ($blocks as $block) {
            $block->delete();
        }
        return;
    }
}
