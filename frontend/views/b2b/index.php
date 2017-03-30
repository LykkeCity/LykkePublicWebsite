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
                    <h2 class="h3 page__subtitle">Lykke Accelerator</h2>

                    <p class="lead text-left ">Digital information can cross borders in an instant, but most business systems have yet to catch up. How much time and money would we save if it were as easy to settle a financial transaction as it is to send an email? What if we applied the same approach to other areas where the future is lagging?</p>
                    <p class="lead text-left ">Lykke Accelerator takes our company’s transformative technology for financial markets and adapts it to your business problems. We use the power of our exchange platform with immediate peer-to-peer settlement and our mobile digital wallet application to streamline your transaction capabilities and make your business leaner and more agile.</p>
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
                                    <img src="img/b2b/deploy_icn.svg" alt="deploy">
                                </div>
                                <div class="col-sm-10">
                                    <h3><a href="b2b_deploy.html">Deploy Blockchain Projects</a></h3>
                                    <p>
                                        Our turnkey Lykke Accelerator solution maximizes the efficiency and cost savings in your business by applying Lykke Wallet and the Lykke Marketplace platform to your existing business environment.
                                    </p>

                                    <a href="/b2b-deploy" class="btn btn-sm">Accelerate me</a>
                                </div>
                            </div>
                        </li>

                        <li class="list__item">
                            <div class="row">
                                <div class="col-sm-2 pull-right">
                                    <img src="img/b2b/manage_icn.svg" alt="manage">
                                </div>
                                <div class="col-sm-10">
                                    <h3><a href="b2b_join.html">Join as Blockchain Accelerator</a></h3>
                                    <p>
                                        We invite visionary technology and sales professionals to join the revolution as our Lykke Accelerator partners.
                                    </p>

                                    <a href="/b2b-join" class="btn btn-sm">Join as Blockchain Accelerator now</a>
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



