<?php
use common\models\ContentBlock;
use common\models\SitePages;
use yii\db\Migration;

class m170420_215415_add_leadership_blocks extends Migration {

    public function safeUp() {
        $page = SitePages::findOne([
            'url' => 'leadership',
        ]);
        $page->template = 'embedded';
        $page->save();
        $block1 = new ContentBlock();
        $block1->pageId = $page->id;
        $block1->ordering = 1;
        $block1->name = 'Sergey Ivliev';
        $block1->title = 'Products & Operations';
        $block1->content
            = '
        Sergey&rsquo;s dream is&nbsp;to&nbsp;make financial market better, faster and more inclusive. For 16&nbsp;years being an&nbsp;industry professional, lecturer, author, events curator, member of&nbsp;editorial boards of&nbsp;academic journals and expert councils he&nbsp;contributes to&nbsp;promote best practices of&nbsp;financial markets and risk management. Executed and supervised 100+ large scale system implementation projects with total revenue exceeding 40&nbsp;Mio. Regional Director at&nbsp;PRMIA Russia and associate professor at&nbsp;Perm State University.
        ';
        $block1->save();
        $block2 = new ContentBlock();
        $block2->pageId = $page->id;
        $block2->ordering = 2;
        $block2->name = 'Michael Nikulin';
        $block2->title = 'Technology';
        $block2->content
            = '
            Michael is architect,
            designer and developer with 10 year experience in&nbsp;creating
            market solutions for financial institutions, including
            Anti-Money Laundering, Fraud Detection and Financial Markets
            Compliance solutions. Combines deep knowledge of financial
            architecture with Blockchain settlement mechanisms.        ';
        $block2->save();
        $block3 = new ContentBlock();
        $block3->pageId = $page->id;
        $block3->ordering = 3;
        $block3->name = 'Lena Mechenkova';
        $block3->title = 'Communications';
        $block3->content
            = '
           Lena is&nbsp;a&nbsp;communications
                    professional with more than 17&nbsp;years&rsquo; experience
                    in&nbsp;public relations and mass media. Areas of&nbsp;expertise
                    include corporate communications, internal communications,
                    event management, change communications, writing, and public
                    speaking.     ';
        $block3->save();
        $block4 = new ContentBlock();
        $block4->pageId = $page->id;
        $block4->ordering = 4;
        $block4->name = 'Thomas Birrer';
        $block4->title = 'Finance';
        $block4->content
            = '
           Thomas&rsquo; background is&nbsp;in&nbsp;commerce
            and banking. Currently Thomas is&nbsp;preparing his
            PhD-Thesis in&nbsp;Economics at&nbsp;the University of&nbsp;Basel.
            He&nbsp;is&nbsp;also a&nbsp;fellow and tutor at&nbsp;the
            Institute for Financial Services Zug where he&nbsp;is&nbsp;engaged
            as&nbsp;director of&nbsp;the &laquo;CFO Forum Schweiz&raquo;,
            as&nbsp;project leader of&nbsp;different projects&nbsp;&mdash;
            amongst them &laquo;currencies as&nbsp;value drivers in&nbsp;companies&raquo;
            sponsored by&nbsp;the Confederation&rsquo;s innovation
            promotion agency.';
        $block4->save();

        $block5 = new ContentBlock();
        $block5->pageId = $page->id;
        $block5->ordering = 5;
        $block5->name = 'Anton Golub';
        $block5->title = 'Science';
        $block5->content
            = '
           Anton worked at&nbsp;the
                    Manchester Business School as&nbsp;a&nbsp;Marie Curie
                    research fellow on&nbsp;high frequency trading, market
                    micro-structure and Flash Crashes.
                    ';
        $block5->save();

        $block6 = new ContentBlock();
        $block6->pageId = $page->id;
        $block6->ordering = 6;
        $block6->name = 'Richard Olsen';
        $block6->title = 'Founder, CEO';
        $block6->content
            = 'Richard is&nbsp;a&nbsp;pioneer
                    in&nbsp;high frequency finance with extensive
                    entrepreneurial experience and well known for his academic
                    work. He&nbsp;was a co-founder of&nbsp;OANDA, a&nbsp;currency
                    information company and market maker in&nbsp;foreign
                    exchange. Under Richard&rsquo;s stewardship as&nbsp;CEO of&nbsp;OANDA
                    the company was a&nbsp;shooting star that launched the first
                    fully automated&nbsp;FX trading platform offering
                    second-by-second interest rate payments and netted 37&nbsp;Mio
                    of&nbsp;profits in&nbsp;2007. Already at&nbsp;OANDA, he&nbsp;conceived
                    the first trading platform with second-by-second interest
                    payments. He&nbsp;is&nbsp;chief executive of&nbsp;Olsen Ltd,
                    an&nbsp;investment manager, and visiting professor at&nbsp;the
                    Centre for Computational Finance and Economic Agents at&nbsp;the
                    University of&nbsp;Essex. His ambition is&nbsp;to&nbsp;transform
                    financial markets into a&nbsp;seamless system without the
                    inefficiencies that we&nbsp;today take for granted.
                    ';
        $block6->save();

        $block6 = new ContentBlock();
        $block6->pageId = $page->id;
        $block6->ordering = 6;
        $block6->name = 'Richard Olsen';
        $block6->title = 'Founder, CEO';
        $block6->content
            = 'Richard is&nbsp;a&nbsp;pioneer
                    in&nbsp;high frequency finance with extensive
                    entrepreneurial experience and well known for his academic
                    work. He&nbsp;was a co-founder of&nbsp;OANDA, a&nbsp;currency
                    information company and market maker in&nbsp;foreign
                    exchange. Under Richard&rsquo;s stewardship as&nbsp;CEO of&nbsp;OANDA
                    the company was a&nbsp;shooting star that launched the first
                    fully automated&nbsp;FX trading platform offering
                    second-by-second interest rate payments and netted 37&nbsp;Mio
                    of&nbsp;profits in&nbsp;2007. Already at&nbsp;OANDA, he&nbsp;conceived
                    the first trading platform with second-by-second interest
                    payments. He&nbsp;is&nbsp;chief executive of&nbsp;Olsen Ltd,
                    an&nbsp;investment manager, and visiting professor at&nbsp;the
                    Centre for Computational Finance and Economic Agents at&nbsp;the
                    University of&nbsp;Essex. His ambition is&nbsp;to&nbsp;transform
                    financial markets into a&nbsp;seamless system without the
                    inefficiencies that we&nbsp;today take for granted.
                    ';
        $block6->save();

        $block7 = new ContentBlock();
        $block7->pageId = $page->id;
        $block7->ordering = 7;
        $block7->name = 'Arseniy Steblyuk';
        $block7->title = 'Risk Management';
        $block7->content
            = 'Arseniy has extensive
                    expertise in&nbsp;maintaining business continuity, ensuring
                    sustainable operations of&nbsp;a&nbsp;highly technical,
                    high-frequency electronic trading firm in&nbsp;complex
                    regulatory environment and promoting companywide risk
                    awareness.
                    ';
        $block7->save();

        $block8 = new ContentBlock();
        $block8->pageId = $page->id;
        $block8->ordering = 8;
        $block8->name = 'Andrey Migin';
        $block8->title = 'Software Development';
        $block8->content
            = 'Andrey is&nbsp;exceptional
                    team leader with 8&nbsp;year professional experience of&nbsp;FX
                    marketplace systems development.
                    ';
        $block8->save();

        $block7 = new ContentBlock();
        $block7->pageId = $page->id;
        $block7->ordering = 7;
        $block7->name = 'Arseniy Steblyuk';
        $block7->title = 'Risk Management';
        $block7->content
            = 'Arseniy has extensive
                    expertise in&nbsp;maintaining business continuity, ensuring
                    sustainable operations of&nbsp;a&nbsp;highly technical,
                    high-frequency electronic trading firm in&nbsp;complex
                    regulatory environment and promoting companywide risk
                    awareness.
                    ';
        $block7->save();

        $block9 = new ContentBlock();
        $block9->pageId = $page->id;
        $block9->ordering = 9;
        $block9->name = 'Shahpour Moavenat';
        $block9->title = 'Blockchain';
        $block9->content
            = 'Shahpour sees the important
                    role that trust plays in&nbsp;bringing people&rsquo;s
                    abilities together. During his university studies
                    cryptography was one of&nbsp;his major concerns. Recently he&nbsp;has
                    tried to&nbsp;put efforts of&nbsp;different people over the
                    Internet to&nbsp;build software. He&nbsp;has found all the
                    tree aspects at&nbsp;Lykke.
                    ';
        $block9->save();

        $block10 = new ContentBlock();
        $block10->pageId = $page->id;
        $block10->ordering = 10;
        $block10->name = 'Demetrios Zamboglou';
        $block10->title = 'International Operations';
        $block10->content
            = 'Demetrios brings a&nbsp;wealth
                    of&nbsp;technical experience finely dovetailed with
                    operational creativity, required to&nbsp;propel Lykke&rsquo;s
                    growth and popularity worldwide. A&nbsp;financial services
                    visionary, with extensive award-winning experience in&nbsp;the
                    fields of&nbsp;risk management, trading, compliance, product
                    development and behavioural science&nbsp;&mdash; Demetrios
                    delivers a&nbsp;high-calibre balanced package of&nbsp;real-time
                    operational proficiency and forward-looking invention to&nbsp;the
                    Lykke vision of&nbsp;changing the world for the better&nbsp;&mdash;
                    and for all.
                    ';
        $block10->save();
    }

    public function safeDown() {
        $page = SitePages::findOne([
            'url' => 'leadership',
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
