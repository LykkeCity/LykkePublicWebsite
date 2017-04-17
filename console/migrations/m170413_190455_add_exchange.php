<?php
use common\models\ContentBlock;
use common\models\SitePages;
use yii\db\Migration;

class m170413_190455_add_exchange extends Migration {

    public function safeUp() {
        $page = SitePages::findOne([
            'url' => 'exchange'
        ]);

        $block1 = new ContentBlock();
        $block1->pageId = $page->id;
        $block1->ordering = 1;
        $block1->name = 'Main';
        $block1->title = 'Lykke Exchange';
        $block1->content = 'A Global Marketplace on the Blockchain';
        $block1->save();

    }

    public function safeDown() {
        $page = SitePages::findOne([
            'url' => 'exchange'
        ]);
        $blocks = ContentBlock::findAll([
            'pageId' => $page->id
        ]);

        foreach ($blocks as $block){
            $block->delete();
        }
        return;
    }

}
