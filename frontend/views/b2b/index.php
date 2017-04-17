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
<<<<<<< HEAD
                                    <h3><a href="/b2b-deploy"><?=$blocks['Deploy']['title']?></a></h3>
                                    <?=$blocks['Deploy']['content']?>
=======
                                    <h3><a href="b2b_deploy.html">Deploy Blockchain Projects</a></h3>
                                    <p>
                                        Our turnkey Lykke Accelerator solution maximizes the efficiency and cost savings in your business by applying Lykke Wallet and the Lykke Marketplace platform to your existing business environment.
                                    </p>

                                    <a href="/b2b-deploy" class="btn btn-sm">Do business smarter</a>
>>>>>>> master
                                </div>
                            </div>
                        </li>

                        <li class="list__item">
                            <div class="row">
                                <div class="col-sm-2 pull-right">
                                    <img src="/img/b2b/manage_icn.svg" alt="manage">
                                </div>
                                <div class="col-sm-10">
<<<<<<< HEAD
                                    <h3><a href="/b2b-join"><?=$blocks['Join']['title']?></a></h3>
                                    <?=$blocks['Join']['content']?>
=======
                                    <h3><a href="b2b_join.html">Join as Blockchain Accelerator</a></h3>
                                    <p>
                                        We invite visionary technology and sales professionals to join the revolution as our Lykke Accelerator partners.
                                    </p>

                                    <a href="/b2b-join" class="btn btn-sm">Become what you believe</a>
>>>>>>> master
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



