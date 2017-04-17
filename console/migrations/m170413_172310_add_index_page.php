<?php
use common\models\ContentBlock;
use common\models\SitePages;
use yii\db\Migration;

class m170413_172310_add_index_page extends Migration {

    public function safeUp() {
        $page = SitePages::findOne([
            'url' => '/'
        ]);

        $block1 = new ContentBlock();
        $block1->pageId = $page->id;
        $block1->ordering = 1;
        $block1->name = 'Main';
        $block1->title = 'Trade FX and Digital Assets';
        $block1->content = 'Access Easily. Use for Free.<br>Settle Immediately.&nbsp;Own Directly.';
        $block1->save();

        $block2 = new ContentBlock();
        $block2->pageId = $page->id;
        $block2->ordering = 2;
        $block2->name = 'LykkeWallet';
        $block2->title = 'LykkeWallet';
        $block2->content = 'Lykke Wallet is a key element of the Lykke trading ecosystem. The Lykke Wallet iOS and Android apps make it simple for you to buy and sell digital currencies and assets on the Lykke Exchange, our next-generation trading platform with zero commission. Immediate settlement and direct ownership are enabled by distributed ledger technology. Now anyone can trade easily!';
        $block2->save();


    }

    public function safeDown() {
        $page = SitePages::findOne([
            'url' => '/'
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
