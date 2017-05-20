<?php
use frontend\widgets\Footer;

?>

  <article class="content page page--text">
    <section class="section section--lead section--padding">
      <div class="container container--extend">
        <h1 class="text-center page__title"><?=$page->name?></h1>
      </div>
    </section>


    <section class="section section--padding_bottom">
      <div class="page_border"></div>

      <div class="container container--extend">
        <div class="row">
          <div class="col-xs-12 col-sm-8 col-md-7 pull-right">

              <? foreach ($blocks as $block) { ?>
                <div class="text">

                  <p class="lead"><?=$block['title']?></p>
                    <?=$block['content']?>

                </div>
              <? } ?>

          </div>

          <div class="col-xs-12 col-sm-4 pull-left">
            <div class="banner_apps">
              <div class="banner_apps__img"><img
                    src="img/wallet_iphone_small.png"
                    alt="wallet" width="216"></div>
              <div class="banner_apps__content">
                <div class="main_projects_list">
                  <div class="main_projects_list__img">
                    <img src="img/logo-lykke.svg" alt="lykke_wallet_logo"
                         width="40">
                  </div>
                  <div class="main_projects_list__title">
                    Lykke<span>Wallet</span>
                  </div>
                </div>

                <h5>Trade FX and Digital Assets</h5>
                <div class="text-muted">Access Easily. Use for Free. <br
                      class="visible-xs visible-sm"> Settle Immediately. Own
                  Directly.
                </div>

                <div class="apps">
                  <div class="apps_apple">
                    <a href="https://appsto.re/ru/Dwjvcb.i"
                       onclick="trackAppStoreLink('https://appsto.re/ru/Dwjvcb.i');"
                       target="_blank">
                      <img
                          src="img/appstore-badge-gray.svg" width="169"
                          alt="apps_apple">
                    </a>
                  </div>
                  <div class="apps_google">
                    <a onclick="trackPlayMarketLink('https://play.google.com/store/apps/details?id=com.lykkex.LykkeWallet');"
                       href="https://play.google.com/store/apps/details?id=com.lykkex.LykkeWallet"
                       target="_blank">
                      <img src="img/google-play-gray.svg"
                           width="169" alt="apps_google">
                    </a>
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