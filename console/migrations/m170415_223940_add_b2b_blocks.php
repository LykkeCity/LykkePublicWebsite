<?php
use common\models\ContentBlock;
use common\models\SitePages;
use yii\db\Migration;

class m170415_223940_add_b2b_blocks extends Migration
{
    public function safeUp() {
        $page = SitePages::findOne([
            'url' => 'b2b'
        ]);

        $block1 = new ContentBlock();
        $block1->pageId = $page->id;
        $block1->ordering = 1;
        $block1->name = 'Main';
        $block1->title = 'Lykke Accelerator';
        $block1->content = '
            <p class="lead text-left ">Digital information can cross borders in an instant, but most business systems have yet to catch up. How much time and money would we save if it were as easy to settle a financial transaction as it is to send an email? What if we applied the same approach to other areas where the future is lagging?</p>
            <p class="lead text-left ">Lykke Accelerator takes our company’s transformative technology for financial markets and adapts it to your business problems. We use the power of our exchange platform with immediate peer-to-peer settlement and our mobile digital wallet application to streamline your transaction capabilities and make your business leaner and more agile.</p>
        ';
        $block1->save();


        $block2 = new ContentBlock();
        $block2->pageId = $page->id;
        $block2->ordering = 2;
        $block2->name = 'Deploy';
        $block2->title = 'Deploy Blockchain Projects';
        $block2->content = '
            <p>
              Our turnkey Lykke Accelerator solution maximizes the efficiency and cost savings in your business by applying Lykke Wallet and the Lykke Marketplace platform to your existing business environment.
            </p>
            <a href="/b2b-deploy" class="btn btn-sm">Accelerate me</a>
        ';
        $block2->save();

        $block3 = new ContentBlock();
        $block3->pageId = $page->id;
        $block3->ordering = 3;
        $block3->name = 'Join';
        $block3->title = 'Join as Blockchain Accelerator';
        $block3->content = '
        <p>
          We invite visionary technology and sales professionals to join the revolution as our Lykke Accelerator partners.
        </p>

        <a href="/b2b-join" class="btn btn-sm">Join as Blockchain Accelerator now</a>
        ';
        $block3->save();

    }

    public function safeDown() {
        $page = SitePages::findOne([
            'url' => 'b2b'
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
