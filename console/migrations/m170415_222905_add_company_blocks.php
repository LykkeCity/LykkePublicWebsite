<?php
use common\models\ContentBlock;
use common\models\SitePages;
use yii\db\Migration;

class m170415_222905_add_company_blocks extends Migration {

    public function safeUp() {
        $page = SitePages::findOne([
            'url' => 'company',
        ]);

        $block1 = new ContentBlock();
        $block1->pageId = $page->id;
        $block1->ordering = 1;
        $block1->name = 'Main';
        $block1->title = 'The Future of Markets';
        $block1->content = '
        <p>Lykke is building a global marketplace for the free exchange of
              financial assets. By leveraging the power of <a href="technology">emerging
                technology</a>, our platform eliminates market inefficiencies,
              promotes equal access from anywhere in the world, and supports the
              trade of any object of value. The Lykke Exchange is fast and
              secure. Users receive direct ownership of assets with immediate
              settlement from any mobile device.</p>
        <p>Richard Olsen, founder and CEO, is a distinguished pioneer in
          high frequency finance. He has been laying the conceptual
          foundations for Lykke for most of his professional life. The
          company was established in Switzerland and received initial seed
          funding in 2015.</p>
        <p>Company shares are issued as colored coins redeemable on the
          Lykke Exchange. Our software is open-source and non-proprietary.&nbsp;</p>
        ';
        $block1->save();

        $block2 = new ContentBlock();
        $block2->pageId = $page->id;
        $block2->ordering = 2;
        $block2->name = 'Links';
        $block2->title = 'Links';
        $block2->content = '
        <div class="row">
            <div class="col-sm-6">
              <ul class="page__list page__list--links">
                <li><a href="technology">Blockchain Technology</a></li>
                <li><a
                      href="https://zg.chregister.ch/cr-portal/auszug/auszug.xhtml?uid=CHE-345.258.499">Commercial
                    register of canton Zug</a></li>
              </ul>
            </div>
            <div class="col-sm-6">
              <ul class="page__list page__list--links">
                <li><a href="media/Whitepaper_LykkeExchange.pdf">Lykke
                    Exchange White Paper</a></li>
                <li><a
                      href="https://www.coinprism.info/asset/AXkedGbAH1XGDpAypVzA5eyjegX4FaCnvM">Lykke
                    Corp Equity on Coinprism</a></li>
              </ul>
            </div>
          </div>
        ';
        $block2->save();
    }

    public function safeDown() {
        $page = SitePages::findOne([
            'url' => 'company',
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
