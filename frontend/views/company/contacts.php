<?php
use frontend\widgets\Footer;
?>

<article class="content page" itemscope itemprop="organization" itemtype="http://schema.org/Organization">
    <section class="section contacts">
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-sm-offset-6 col-sm-6 col-md-offset-7 col-md-5">
                    <h1 class="h1">Contacts</h1>

                    <p>Lykke would like to know your opinion.</p>
                    <p>Please feel free to contact us to make a suggestion, get information, or leave a comment:
                        <a href="mailto:lykke@lykke.com">lykke@lykke.com</a>
                    </p>
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
                                        <div class="sub_title"><i class="contacts__icon contacts__icon--mail"></i> Media contact</div>
                                        <a href="mailto:pr@lykke.com">pr@lykke.com</a>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-12">
                                    <div class="contacts__block">
                                        <div class="sub_title"><i class="contacts__icon contacts__icon--call"></i> support</div>
                                        <p><a href="mailto:support@lykke.com"><span itemprop="email">support@lykke.com</span></a></p>
                                        <a class="visible-md visible-lg" href="callto:+41615880402"><span itemprop="telephone">+41 61 588 04 02</span></a>
                                        <!--noindex--><a class="visible-xs visible-sm" href="tel:+41615880402">+41 61 588 04 02</a><!--/noindex-->
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="sub_title"><i class="contacts__icon contacts__icon--pin"></i> Addresses</div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <p class="contacts__block" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                        <span itemprop="name">Lykke Corp</span> <br>
                                        <span itemprop="streetAddress">2 Baarerstrasse</span> <br>
                                        <span itemprop="postalCode">6300</span>
                                        <span itemprop="addressLocality">Zug<br> Switzerland</span>
                                    </p>
                                </div>
                                <div class="col-xs-6">
                                    <p class="contacts__block" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                        <span itemprop="name">Lykke Corp UK</span> <br>
                                        <span itemprop="streetAddress">86-90 Paul Street</span> <br>
                                        <span itemprop="postalCode">London EC2A 4NE</span> <br>
                                        <span itemprop="addressLocality">United Kingdom</span>
                                    </p>
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
