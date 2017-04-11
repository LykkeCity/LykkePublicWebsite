<?php
use frontend\widgets\Footer;
?>

<article class="content page" itemscope itemprop="organization" itemtype="http://schema.org/Organization">
    <section class="section contacts">
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-sm-offset-6 col-sm-6 col-md-offset-7 col-md-5">
                    <h1 class="h1"><?=$blocks['MainText']['title']?></h1>
                    <?=$blocks['MainText']['content']?>
                </div>
            </div>
        </div>
    </section>

    <section class="contacts--bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-md-9 col-lg-8 automargin">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-xs-6 col-sm-12">
                                    <div class="contacts__block">
                                        <div class="sub_title"><i class="contacts__icon contacts__icon--mail"></i>  <?=$blocks['Media contact']['title']?></div>
                                        <?=$blocks['Media contact']['content']?>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-12">
                                    <div class="contacts__block">
                                        <div class="sub_title"><i class="contacts__icon contacts__icon--call"></i> <?=$blocks['Support']['title']?></div>
                                        <?=$blocks['Support']['content']?>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="sub_title"><i class="contacts__icon contacts__icon--pin"></i> <?=$blocks['Addresses #1']['title']?></div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <?=$blocks['Addresses #1']['content']; ?>
                                </div>
                                <div class="col-xs-6">
                                    <?=$blocks['Addresses #2']['content']; ?>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>

</article>

<?=Footer::widget();?>
