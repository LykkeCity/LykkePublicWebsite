<?php
use common\models\ContentBlock;
use common\models\SitePages;
use yii\db\Migration;

class m170415_235855_add_b2b_deploy_blocks extends Migration {

    public function safeUp() {
        $page = SitePages::findOne([
            'url' => 'b2b-deploy',
        ]);
        $block1 = new ContentBlock();
        $block1->pageId = $page->id;
        $block1->ordering = 1;
        $block1->name = 'Main';
        $block1->title = 'Deploy Blockchain Projects';
        $block1->content
            = '
          <p class="lead text-left ">Simply stated, the same efficiencies that power our global exchange platform with immediate settlement and our digital wallet technology for desktop or mobile can revitalize your business. We can help you to shrug off the dead weight of outmoded thinking and unlock the potential of the digital age with minimal disruption to existing processes.</p>
          <p class="lead text-left ">Lykke Accelerator puts our team of world-class cryptographers, economists, legal experts, and project managers to work for you as your personal research and development group. Together, we can help your company to compete more effectively, seize new opportunities, and realize huge savings.</p>
          <h3 class="h2">What we can do for your business</h3>
        ';
        $block1->save();

        $block2 = new ContentBlock();
        $block2->pageId = $page->id;
        $block2->ordering = 2;
        $block2->name = 'Commercial banks';
        $block2->title = 'Commercial banks';
        $block2->content = '
        <p>Banks are well positioned to issue and exchange digital assets. Your bank could be a custodian for securities or simply a gateway for on-demand deposits. At Lykke, we are committed to helping banks digitize their core processes and make new business on the Blockchain.</p>
        ';
        $block2->save();

        $block3 = new ContentBlock();
        $block3->pageId = $page->id;
        $block3->ordering = 3;
        $block3->name = 'Peer-to-peer';
        $block3->title = 'Peer-to-peer lending companies';
        $block3->content = '
          <p>Crowdlending platforms are constrained by the cash holding period, which makes the loan fulfillment process a bumpy road. Significant costs arise during all cash movements, especially during the distribution of installment payments. Lykke helps to move the cash leg onto the Blockchain, issue and allocate claim tokens for each loan, distribute installment payments to the claimholders for a trivial cost, and—cruicially—organize a secondary market for the claims, which could become a unique selling point for your p2p lending platform.</p>
        ';
        $block3->save();

        $block4 = new ContentBlock();
        $block4->pageId = $page->id;
        $block4->ordering = 4;
        $block4->name = 'Industry consortiums';
        $block4->title = 'Industry consortiums';
        $block4->content = '
          <p>Industry consortiums and large international holdings face complicated cash settlement processes with significant funds moving across borders. To optimize the clearing procedure, Lykke can show you how to design a platform based on Settlement Coin, which can massively speed up the payments for services provided by a multitude of consortium or holding members.</p>
        ';
        $block4->save();

        $block5 = new ContentBlock();
        $block5->pageId = $page->id;
        $block5->ordering = 5;
        $block5->name = 'IoT firms';
        $block5->title = 'IoT firms';
        $block5->content = '
            <p>As IoT devices become smarter, they integrate into networks of interacting heterogenous agents. We are working on embedding our wallet technology into IoT devices to enable low-value transactions, where one or both parties are potential actors in a true Economy of Things.</p>
        ';
        $block5->save();

        $block6 = new ContentBlock();
        $block6->pageId = $page->id;
        $block6->ordering = 6;
        $block6->name = 'Global merchants';
        $block6->title = 'Global merchants';
        $block6->content = '
          <p>The Lykke platform provides the potential to develop Blockchain-based loyalty cards, which offer an immutable, accurate, and transparent record of the holder’s current loyalty points.</p>
        ';
        $block6->save();

        $block7 = new ContentBlock();
        $block7->pageId = $page->id;
        $block7->ordering = 7;
        $block7->name = 'Large event';
        $block7->title = 'Large event organizers';
        $block7->content = '
          <p>With Lykke, you can create unique, branded, event-specific currency for your clients. Participants can use this currency to purchase access or tickets to the event, buy memorabilia or merchandise from all event vendors, and settle all related payments.</p>
        ';
        $block7->save();
    }

    public function safeDown() {
        $page = SitePages::findOne([
            'url' => 'b2b-deploy',
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
