<?php
use common\models\ContentBlock;
use common\models\SitePages;
use yii\db\Migration;

class m170415_223447_add_technology_block extends Migration {

    public function safeUp() {
        $page = SitePages::findOne([
            'url' => 'technology',
        ]);
        $block1 = new ContentBlock();
        $block1->pageId = $page->id;
        $block1->ordering = 1;
        $block1->name = 'Main';
        $block1->title = 'Technology';
        $block1->content = '
        <p>The Lykke marketplace uses the distributed ledger, which is blockchain technology pioneered by Bitcoin.</p>
        <p>This technology incorporates a protocol for decentralized data storage in the chain of blocks, where the consistency of the data is guaranteed by the cryptography and consensus of multiple nodes.</p>

        <div class="image-container">
            <img src="/img/corp/tech.png" width="1056" class="img-responsive" alt="tech">
        </div>
        <p>The blockchain makes it possible to create a global marketplace that will be a level playing field, where any financial asset can be traded directly for any other asset or instrument.</p>
        <ul>
            <li><div class="li">It\'s decentralized. There is no central authority in the blockchain, so no one can manipulate the data or block the procedures.</div></li>
            <li><div class="li">It\'s secure. The blockchain enables people who do not know each other to build a global notary service. The step-by-step procedure is a safeguard against fraud, and it reduces the risk associated with transactions.</div></li>
            <li><div class="li">It\'s easily accessible. Everyone will be able to have free access to the marketplace from any location, just like with the Internet.</div></li>
            <li><div class="li">It\'s peer-to-peer. There is no intermediary, transaction costs are low, and transactions are faster than in many existing systems.</div></li>
            <li><div class="li">It supports direct ownership. Contracting parties can immediately have direct ownership, which reduces complexity.</div></li>
        </ul>
        <a href="/media/Whitepaper_LykkeExchange.pdf" class="btn btn--stroke btn--go">Discover more</a>
        ';
        $block1->save();
    }

    public function safeDown() {
        $page = SitePages::findOne([
            'url' => 'technology',
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
