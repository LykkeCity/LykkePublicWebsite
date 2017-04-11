<?php
use common\models\ContentBlock;
use common\models\SitePages;
use yii\db\Migration;

class m170411_081435_add_contacts_page extends Migration
{
    public function safeUp()
    {
        $contacts_page = SitePages::findOne([
            'url' => 'contacts'
        ]);

        $block1 = new ContentBlock();
        $block1->pageId = $contacts_page->id;
        $block1->ordering = 1;
        $block1->name = 'MainText';
        $block1->title = 'Contacts';
        $block1->content = '<p>Lykke would like to know your opinion.</p><p>Please feel free to contact us to make a suggestion, get information, or leave a comment:<a href="mailto:lykke@lykke.com">lykke@lykke.com</a></p>';
        $block1->save();

        $block2 = new ContentBlock();
        $block2->pageId = $contacts_page->id;
        $block2->ordering = 2;
        $block2->name = 'Media contact';
        $block2->title = 'Media contact';
        $block2->content = '<p><a href="mailto:pr@lykke.com">pr@lykke.com</a></p>';
        $block2->save();


        $block3 = new ContentBlock();
        $block3->pageId = $contacts_page->id;
        $block3->ordering = 3;
        $block3->name = 'Support';
        $block3->title = 'Support';
        $block3->content = '<p><a href="mailto:support@lykke.com"><span itemprop="email">support@lykke.com</span></a></p><a class="visible-md visible-lg" href="callto:+41615880402"><span itemprop="telephone">+41 61 588 04 02</span></a><!--noindex--><a class="visible-xs visible-sm" href="tel:+41615880402">+41 61 588 04 02</a><!--/noindex--> ';
        $block3->save();


        $block4 = new ContentBlock();
        $block4->pageId = $contacts_page->id;
        $block4->ordering = 4;
        $block4->name = 'Addresses #1';
        $block4->title = 'Addresses';
        $block4->content = '<p class="contacts__block">Lykke Corp <br />2 Baarerstrasse <br />6300Zug<br /> Switzerland</p>';
        $block4->save();

        $block5 = new ContentBlock();
        $block5->pageId = $contacts_page->id;
        $block5->ordering = 5;
        $block5->name = 'Addresses #2';
        $block5->title = 'Addresses';
        $block5->content = '<p class="contacts__block">Lykke Corp UK <br />86-90 Paul Street <br />London EC2A 4NE <br />United Kingdom</p>';
        $block5->save();


    }

    public function safeDown()
    {
        $contacts_page = SitePages::findOne([
            'url' => 'contacts'
        ]);
        $blocks = ContentBlock::findAll([
            'pageId' => $contacts_page->id
        ]);

        foreach ($blocks as $block){
            $block->delete();
        }
        return;
    }
}
