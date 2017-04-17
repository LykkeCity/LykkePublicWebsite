<?php
use common\models\ContentBlock;
use common\models\SitePages;
use yii\db\Migration;

class m170416_002809_add_b2b_join_blocks extends Migration
{

    public function safeUp() {
        $page = SitePages::findOne([
            'url' => 'b2b-join',
        ]);
        $block1 = new ContentBlock();
        $block1->pageId = $page->id;
        $block1->ordering = 1;
        $block1->name = 'Main';
        $block1->title = 'Join as Blockchain Accelerator';
        $block1->content = '
            <p class="lead text-left ">You’re ready to transform business as we know it. You’re committed to exploring new ideas—and proposing some new ideas of your own. But the world’s not changing fast enough, and there’s only so much that you can do individually.</p>
            <p class="lead text-left ">So expand your reach by becoming our partner. Bring us your use case with a client in mind. We’ll supply our expertise and technological infrastructure. You own the relationship with your client throughout.</p>
            <p class="lead text-left ">We are actively seeking FinTech experts (on the Blockchain, but also not exclusively to the Blockchain) as well as consultants and system integration providers to become our Lykke Accelerator partners. If you share our vision for transformational technology and have a novel way to apply it, don’t wait for us for discover you; introduce yourself!</p>
        ';
        $block1->save();

        $block2 = new ContentBlock();
        $block2->pageId = $page->id;
        $block2->ordering = 2;
        $block2->name = 'Apply';
        $block2->title = 'Apply';
        $block2->content = '
            <p>Send us your proposal for your use case or client. Make us understand why you’re right for this job and what role you’d like Lykke to play. If we like what we see, we’ll ask for your CV (or the CVs of your team) outlining your experience in project management.</p>
        ';
        $block2->save();

        $block3 = new ContentBlock();
        $block3->pageId = $page->id;
        $block3->ordering = 3;
        $block3->name = 'Sign with Lykke';
        $block3->title = 'Sign with Lykke';
        $block3->content = '
            <p>We negotiate the terms of our partnership, including billing rates, guidelines, and project metrics.</p>
        ';
        $block3->save();

        $block4 = new ContentBlock();
        $block4->pageId = $page->id;
        $block4->ordering = 4;
        $block4->name = 'Utilize Lykke resources';
        $block4->title = 'Utilize Lykke resources';
        $block4->content = '
            <p>Receive the right to use our fully operational exchange platform and wallet app, and leverage our team’s expertise when you need it.</p>
        ';
        $block4->save();

        $block5 = new ContentBlock();
        $block5->pageId = $page->id;
        $block5->ordering = 5;
        $block5->name = 'Profit';
        $block5->title = 'Profit';
        $block5->content = '
            <p>You’re not licensing Lykke. You’re partnering with us. As partners, we share in the revenues together.</p>
        ';
        $block5->save();


    }

    public function safeDown() {
        $page = SitePages::findOne([
            'url' => 'b2b-join',
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
