<?php
use frontend\widgets\ContactUs;
use frontend\widgets\Footer;
?>

<?=ContactUs::widget()?>

<article class="content page">
    <section class="section section--lead section--padding">
        <div class="container container--extend">
            <div class="row">
                <div class="col-sm-8 automargin">
                    <h1 class="text-center page__title">Lykke<span>B2B</span></h1>
                    <h2 class="h3 page__subtitle"><?=$blocks['Main']['title']?></h2>
                    <?=$blocks['Main']['content']?>

                </div>
            </div>
        </div>
    </section>

    <section class="section section--padding_bottom">
        <div class="container container--extend">
            <div class="row">
                <div class="col-sm-8 automargin">

                    <ul class="list list--media">
                        <li class="list__item">
                            <div class="row">
                                <div class="col-sm-2 pull-right">
                                    <img src="/img/b2b/deploy_icn.svg" alt="deploy">
                                </div>
                                <div class="col-sm-10">
                                    <h3><a href="/b2b-deploy"><?=$blocks['Deploy']['title']?></a></h3>
                                    <?=$blocks['Deploy']['content']?>
                                </div>
                            </div>
                        </li>

                        <li class="list__item">
                            <div class="row">
                                <div class="col-sm-2 pull-right">
                                    <img src="/img/b2b/manage_icn.svg" alt="manage">
                                </div>
                                <div class="col-sm-10">
                                    <h3><a href="/b2b-join"><?=$blocks['Join']['title']?></a></h3>
                                    <?=$blocks['Join']['content']?>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
</article>

<?=Footer::widget();?>



