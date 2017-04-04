<?php
use frontend\widgets\Footer;
?>

<article class="content page">
    <section class="section section--lead section--padding">
        <div class="container">
            <div class="col-sm-8 automargin">
                <h1 class="text-center page__title">Lykke<span>City</span></h1>
                <h2 class="h3 page__subtitle">The Lykke community</h2>

                <p class="lead text-left text-center-sm">We want to change the world</p>

                <div class="page__features features">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="features__item features__item--dur1">
                                <div class="features__item__img"><img src="/img/feature7.svg" height="75" alt="employing"/></div>
                                <p class="features__item__text">By employing transparent blockchain technology </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="features__item features__item--dur3">
                                <div class="features__item__img"><img src="/img/feature8.svg" height="69" alt="achieving"/></div>
                                <p class="features__item__text">By achieving reliability and accessibility of financial services  </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="features__item features__item--dur4">
                                <div class="features__item__img"><img src="/img/feature9.svg" height="73" alt="open_sourcing"/></div>
                                <p class="features__item__text">By open-sourcing knowledge and competences</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 automargin">
                    <div class="h1">What is Lykke?</div>

                    <p>The ultimate goal of Lykke is to enable every person in the world to have market access and issue his or her own currencies. If we succeed, we can establish human rights for market access and issuance of means of payment.</p>
                    <p>The distributed ledger technology offers a unique opportunity to rewire the existing financial system for substantially greater efficiency and equality of access. We will use the technology as a global notary service to record and settle any type of transaction. We will build a single global marketplace, where any asset from around the world can be traded and exchanged for any other asset at a fair market price. Initially, we will focus on foreign exchange, but we plan to expand into money market instruments, bonds, equities, and so on. Our software is open source; <a href="https://github.com/LykkeCity/">see Lykke Github</a>.</p>
                    <p>Our company is crowd-based at all levels, with citizen-contributors from around the world.</p>
                </div>
            </div>
        </div>
    </section>
</article>

<?=Footer::widget();?>