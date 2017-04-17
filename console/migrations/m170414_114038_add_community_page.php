<?php
use common\models\ContentBlock;
use common\models\SitePages;
use yii\db\Migration;

class m170414_114038_add_community_page extends Migration {

    public function safeUp() {
        $page = SitePages::findOne([
            'url' => 'community'
        ]);

        $block1 = new ContentBlock();
        $block1->pageId = $page->id;
        $block1->ordering = 1;
        $block1->name = 'Main';
        $block1->title = 'What is Lykke?';
        $block1->content = '<p>The ultimate goal of Lykke is to enable every person in the world to have market access and issue his or her own currencies. If we succeed, we can establish human rights for market access and issuance of means of payment.</p>
                    <p>The distributed ledger technology offers a unique opportunity to rewire the existing financial system for substantially greater efficiency and equality of access. We will use the technology as a global notary service to record and settle any type of transaction. We will build a single global marketplace, where any asset from around the world can be traded and exchanged for any other asset at a fair market price. Initially, we will focus on foreign exchange, but we plan to expand into money market instruments, bonds, equities, and so on. Our software is open source; <a href="https://github.com/LykkeCity/">see Lykke Github</a>.</p>
                    <p>Our company is crowd-based at all levels, with citizen-contributors from around the world.</p>';
        $block1->save();

    }

    public function safeDown() {
        $page = SitePages::findOne([
            'url' => 'community'
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
