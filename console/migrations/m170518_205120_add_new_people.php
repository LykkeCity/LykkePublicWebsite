<?php
use common\models\ContentBlock;
use common\models\SitePages;
use yii\db\Migration;

class m170518_205120_add_new_people extends Migration {

    public function safeUp() {
        $page = SitePages::findOne([
            'url' => 'leadership',
        ]);
        $page->template = 'embedded';
        $page->save();
        $block1 = new ContentBlock();
        $block1->pageId = $page->id;
        $block1->ordering = 1;
        $block1->name = 'Niklaus Mettler';
        $block1->title = '';
        $block1->content
            = '
       Niklaus makes financial markets more accessible, democratic, and open. He brings more than 30 years of professional experience in project management across different industries, including overseeing fundamental banking changes, leading and coaching high-performing teams, and training and mentoring leaders.
       <br>He is a citizen of Switzerland and the European Union, and he speaks German, English, French, and Italian.
        ';
        $block1->save();

        $block2 = new ContentBlock();
        $block2->pageId = $page->id;
        $block2->ordering = 1;
        $block2->name = 'Benedikt Schuppli';
        $block2->title = '';
        $block2->content
            = '
        Benedikt works as Legal Counsel for Lykke. He obtained his law degree from the University of Zurich and went on to work for organizations in the private and public sectors, including a Swiss bank and several law firms. He is currently preparing for his bar exam.
        <br>A resident of Basel, Switzerland, he has a lifelong love of learning. For several years, his professional interests have included cryptocurrencies and equity. In his spare time, he enjoys sports such as running, hiking, and tennis. He is also a passionate musician and multi-instrumentalist.
        ';
        $block2->save();

        $block3 = new ContentBlock();
        $block3->pageId = $page->id;
        $block3->ordering = 1;
        $block3->name = 'Andrey Snetkov';
        $block3->title = '';
        $block3->content
            = '
        Andrey is a developer for iOS and OS X, with proficiencies in Objective C and Swift. He graduated from the Siberian State Aerospace University with a Master’s degree in system analysis and control.
        <br>He loves traveling, reading books, and sometimes cooking.
        ';
        $block3->save();

        $block4 = new ContentBlock();
        $block4->pageId = $page->id;
        $block4->ordering = 1;
        $block4->name = 'Seamus Donoghue';
        $block4->title = '';
        $block4->content
            = '
        Seamus is spearheading our build out in Asia. He has 25 years of experience in financial markets working for top tier investment banks and a fin tech start-up focused on wholesale trading of physical commodities. He has been based in Singapore and Japan since 1998. 
        ';
        $block4->save();
    }

    public function safeDown() {
        $page = SitePages::findOne([
            'url' => 'leadership',
        ]);
        $block = ContentBlock::findOne([
            'name' => '',
        ]);
        $block->delete();
        $block = ContentBlock::findOne([
            'name' => '',
        ]);
        $block->delete();
        $block = ContentBlock::findOne([
            'name' => '',
        ]);
        $block->delete();
        $block = ContentBlock::findOne([
            'name' => '',
        ]);
        $block->delete();
        return;
    }

}
