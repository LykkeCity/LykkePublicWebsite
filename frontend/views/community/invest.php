<?php
use frontend\widgets\Footer;
use frontend\widgets\SubMenu;

?>

<?=SubMenu::widget()?>

<article class="content page page_invest landing">
  <section class="section--padding">
    <div class="container container--extend">

      <div class="row">
        <div class="col-md-8 col-sm-10 automargin">
          <div class="heading_with_select clearfix">
            <h1 class="h1 text-center">Invest</h1>
          </div>

          <div class="features">
            <div class="features__item">
              <div class="features__img"><img src="/img/affiliates/bonuses-icn.svg" width="70" alt="bonuses"></div>
              <div class="features__title"><?= $capitalization ?> USD</div>
              <div class="features__text">Free-float Capitalization</div>
            </div>
            <div class="features__item">
              <div class="features__img"><img src="/img/invest/wallet_icn.svg" width="70" alt="wallet_icn"></div>
              <div class="features__title"><?=$wallets?></div>
              <div class="features__text">Accounts registered</div>
            </div>
            <div class="features__item">
              <div class="features__img"><img src="/img/affiliates/lw-users-icn.svg" width="50" alt="lw"></div>
              <div class="features__title"><?=$holders?></div>
              <div class="features__text">Coinholders</div>
            </div>
          </div>

          <?/*
          <h3>Market Cap and Price</h3>

          <div class="landing_media">
            <img src="/img/invest/invest_bg.jpg" alt="invest_bg" class="img-responsive">
          </div>
          */?>
          <?/*
          <h3>Currently tradable </h3>

          <div class="row">
            <div class="col-xs-6 col-sm-3">
              <ul class="assets_list assets_list--alt">
                <li class="assets_list__item"><a href="exchange_ticker.html">
                  <span>Solar Coin</span>
                </a></li>
                <li class="assets_list__item"><a href="exchange_ticker.html">
                  <span>Lykke yen</span>
                </a></li>
                <li class="assets_list__item"><a href="exchange_ticker.html">
                  <span>Lykke coin</span>
                </a></li>
              </ul>
            </div>

            <div class="col-xs-6 col-sm-3">
              <ul class="assets_list assets_list--alt">
                <li class="assets_list__item"><a href="exchange_ticker.html">
                  <span>Bitcoin</span>
                </a></li>
                <li class="assets_list__item"><a href="exchange_ticker.html">
                  <span>Lykke dollars</span>
                </a></li>
                <li class="assets_list__item"><a href="exchange_ticker.html">
                  <span>Lykke pounds</span>
                </a></li>
              </ul>
            </div>

            <div class="col-xs-6 col-sm-3">
              <ul class="assets_list assets_list--alt">
                <li class="assets_list__item"><a href="exchange_ticker.html">
                  <span>Lykke euros</span>
                </a></li>
                <li class="assets_list__item"><a href="exchange_ticker.html">
                  <span>Lykke Swiss francs</span>
                </a></li>
                <li class="assets_list__item"><a href="exchange_ticker.html">
                  <span>Ethereum</span>
                </a></li>
              </ul>
            </div>

            <div class="col-xs-6 col-sm-3">
              <ul class="assets_list assets_list--alt">
                <li class="assets_list__item"><a href="exchange_ticker.html">
                  <span>TIME</span>
                </a></li>
                <li class="assets_list__item"><a href="exchange_ticker.html">
                  <span>TREE</span>
                </a></li>
              </ul>
            </div>

          </div>
          */?>
        </div>
      </div>

    </div>
  </section>

  <section class="section section--padding section--gray">
    <div class="container container--extend">
      <div class="row">
        <div class="col-md-8 col-sm-10 automargin">
          <h3 class="h2 text-center">Lykke coins and shares</h3>

          <div class="row">
            <div class="col-md-6">
              <p>The share capital in the amount of <b>CHF 128,569</b> is divided into <b>12,856,900</b> fully-paid registered shares with a nominal value of CHF 0.01 per share.</p>
            </div>
            <div class="col-md-6">
              <p>The shares are registered on blockchain. In total 1,285,690,000 Lykke coins (LKK) are issued. Each registered share of Lykke Corp corresponds to <b>100</b> Lykke coins. </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section section--padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-10 automargin">
          <h3 class="h2">Lykke ownership structure</h3>

          <div class="row">
            <div class="col-md-6">
              <div class="invest_total invest_total--big">
                <div class="invest_total__value"><span id="invest_total__value-api"><?= $totalLykkeCoins ?></span> <span>LKK</span></div>
              </div>
              <a href="https://blockchainexplorer.lykke.com/asset/AXkedGbAH1XGDpAypVzA5eyjegX4FaCnvM" class="btn btn--blue">View Lykke coinholders</a>
            </div>
            <div class="col-md-6">
              <div class="invest_total">
                <div class="invest_total__value">
                  <span id="invest_private-wallets__value-api"><?= $privateWalletsCoins ?></span> <span>LKK</span>
                  <div class="invest_total__ownership">
                    <span class="_value"><span id="invest_private-wallets__value-percent"></span>%</span>

                    <div class="ownership_value" id="invest_private-wallets__line"></div>
                  </div>
                </div>
                <div class="invest_total__desc">Private wallets</div>
              </div>
              <div class="invest_total">
                <div class="invest_total__value">
                  <span id="invest_trading-wallets__value-api"><?= $tradingWalletsCoins ?></span> <span>LKK</span>

                  <div class="invest_total__ownership">
                    <span class="_value" ><span id="invest_trading-wallets__value-percent"></span>%</span>
                    <div class="ownership_value" id="invest_trading-wallets__line"></div>
                  </div>
                </div>
                <div class="invest_total__desc">Trading wallets</div>
              </div>
              <div class="invest_total">
                <div class="invest_total__value">
                 <span id="invest_treasury-coins__value-api"><?= $treasuryCoins ?></span> <span>LKK</span>

                  <div class="invest_total__ownership">
                    <span class="_value"><span id="invest_treasury-coins__value-percent"></span>%</span>
                    <div class="ownership_value" id="invest_treasury-coins__line"></div>
                  </div>
                </div>
                <div class="invest_total__desc">Owned by <a href="https://www.coinprism.info/address/akFi7XEmeEXPw5zPBxtktGWf4NiqJJpFvGK" target="_blank">Lykke Corp treasury</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section section--padding section--gray">
    <div class="container container--extend">
      <div class="row">
        <div class="col-md-8 col-sm-10 automargin">
          <h3 class="h2">Information disclosure</h3>

          <div class="row">
            <ul class="list list--invest">
              <li class="list__item col-xs-12 col-sm-6">
                <div class="list__icon"><img src="/img/invest/disclosure/company_register_icn.svg" alt="company_register_icn" width="42" height="42"></div>
                <div class="list__text">
                  <p>Company Register</p>
                  <a href=" https://zg.chregister.ch/cr-portal/auszug/auszug.xhtml?uid=CHE-345.258.499" target="_blank">View on Powernet</a>
                </div>
              </li>
              <li class="list__item col-xs-12 col-sm-6">
                <div class="list__icon"><img src="/img/invest/disclosure/annual_report_icn.svg" alt="annual_report_icn" width="42" height="38"></div>
                <div class="list__text">
                  <p>Annual Report (2015)</p>
                  <a href="https://www.lykke.com/Annual_Report_2015.pdf">Download</a>
                </div>
              </li>
              <li class="list__item col-xs-12 col-sm-6">
                <div class="list__icon"><img src="/img/invest/disclosure/memorandum_icn.svg" alt="memorandum_icn" width="35" height="39"></div>
                <div class="list__text">
                  <p>Lykke Corp Placement Memorandum</p>
                  <a href="https://www.lykke.com/Lykke_Corp_Placement_Memorandum.pdf">Download</a>
                </div>
              </li>
              <li class="list__item col-xs-12 col-sm-6">
                <div class="list__icon"><img src="/img/invest/disclosure/roadmap_icn.svg" alt="roadmap_icn" width="40" height="40"></div>
                <div class="list__text">
                  <p>Investor Deck</p>
                  <a href="https://forward.lykke.com/files/Investor_deck.pdf">Download</a>
                </div>
              </li>
              <li class="list__item col-xs-12 col-sm-6">
                <div class="list__icon"><img src="/img/invest/disclosure/equity_icn.svg" alt="equity_icn" width="36" height="34"></div>
                <div class="list__text">
                  <p>Lykke Corp Equity Register on Blockchain</p>
                  <a href="https://www.coinprism.info/asset/AXkedGbAH1XGDpAypVzA5eyjegX4FaCnvM" target="_blank">View on Coinprism</a>
                </div>
              </li>

            </ul>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="section section--padding">
    <div class="container">

      <div class="row">
        <div class="col-md-10 automargin">
          <h3 class="h2">Lykke Feeds</h3>

          <div class="row">
            <div class="col-sm-6">
              <div class="section_header">
                <h3>Tweets <span class="hint">by <a href="https://twitter.com/LykkeCity" target="_blank">LykkeCity</a></span></h3>
              </div>

              <div class="widget_tw">
                <a class="twitter-timeline" data-height="645" href="https://twitter.com/LykkeCity">Tweets by LykkeCity</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="section_header">
                <h3>News</h3>
              </div>

              <div class="news_list news_list--simple">
                <?foreach ($posts as $post) {?>
                  <div class="news_list__item">
                    <div class="news_list__date"><?=date('F d',strtotime($post->post_datetime));?></div>
                    <div class="news_list__title"><a href="/company/news/<?=$post->post_url?>"><?=$post->post_title?></a></div>
                    <p class="news_list__desc"><?=$post->post_preview_text?></p>
                  </div>
                <?}?>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section section--padding section--gray">
    <div class="container container--extend">
      <div class="row">
        <div class="col-md-8 col-sm-10 automargin">
          <h3 class="h2 text-center">Investors about Lykke</h3>

          <div class="reviews_list">
            <div class="row">
              <div class="col-sm-6">

                <div class="review_item">
                  <div class="review_item__text">
                    <p>Lykke is based on a great idea and it starts to be a giant movement that will trigger a lot of very important changes in the financial industry.</p>
                  </div>
                  <div class="review_item__author">Philipp Netzer</div>
                  <div class="review_item__author_info">Lykke angel investor</div>
                </div>
                <div class="review_item">
                  <div class="review_item__text">
                    <p>
                      As an angel investor, I like to see companies that can focus and create a satisfying customer experience while planning to go big and build on each success. That’s exactly what is happening at Lykke - that rare combination of talent, ambition, and a team that works well together. It’s a pleasure to watch.
                    </p>
                  </div>
                  <div class="review_item__author">Heinrich Zetlmayer</div>
                  <div class="review_item__author_info">Lykke angel investor and board member</div>
                </div>
                <div class="review_item">
                  <div class="review_item__text">
                    <p>The Lykke project is huge and visionary. They are going to create much more than a currency exchange. You’ll be able to exchange land, cars, fractional ownership of anything, stock, bonds, art, tickets - all kinds of things. If it’s digital and it holds or represents value, you’ll be able to trade it on your Lykke wallet. Think of it as a combination of Google and eBay for digital values.</p>
                    <p>Lykke wallet is your future store of digitalized financial assets. Besides buying and selling digital assets at no cost you can store them also at no cost in your cryptographic Lykke wallet, like you store financial assets on a bank deposit.</p>
                  </div>
                  <div class="review_item__author">Michael Hobmeier</div>
                  <div class="review_item__author_info">Lykke angel investor and board member</div>
                </div>

              </div>

              <div class="col-sm-6">
                <div class="review_item">
                  <div class="review_item__text">
                    <p>Lykke will change the world of finance. This company has everything to make it happen!</p>
                  </div>
                  <div class="review_item__author">Alexander Spuller </div>
                  <div class="review_item__author_info">Lykke angel investor and board member</div>
                </div>

                <div class="review_item">
                  <div class="review_item__text">
                    <p>The Lykke project is huge and visionary. They are going to create much more than a currency exchange. You’ll be able to exchange land, cars, fractional ownership of anything, stock, bonds, art, tickets - all kinds of things. If it’s digital and it holds or represents value, you’ll be able to trade it on your Lykke wallet. Think of it as a combination of Google and eBay for digital values.</p>
                    <p>Lykke wallet is your future store of digitalized financial assets. Besides buying and selling digital assets at no cost you can store them also at no cost in your cryptographic Lykke wallet, like you store financial assets on a bank deposit.</p>
                  </div>
                  <div class="review_item__author">Ralph Zurkinden</div>
                  <div class="review_item__author_info">Lykke angel investor and board member</div>
                </div>

              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="section section--padding invest_apps" id="buy_lykke">
    <div class="container">

      <div class="row">
        <div class="col-sm-10 automargin">
          <div class="row">
            <div class="col-sm-6 hidden-sm hidden-xs">
              <div class="invest_apps__img">
                <img src="/img/invest/invest_phone.png" alt="invest_phone" width="430">
              </div>
            </div>
            <div class="col-sm-8 col-sm-offset-2 col-md-offset-0 col-md-6">
              <div class="invest_apps__main">
                <h3 class="h2">Buy Lykke Coins</h3>
                <h3 class="regular">To buy Lykke coins, download and open the Lykke Wallet app</h3>
                <div class="apps">
                  <div class="apps_apple"><a href="https://appsto.re/ru/Dwjvcb.i" target="_blank"><img src="/img/appstore-badge.svg" width="203" height="60" alt="apps_apple"></a></div>
                  <div class="apps_google"><a href="https://play.google.com/store/apps/details?id=com.lykkex.LykkeWallet" target="_blank"><img src="/img/google-play.svg" width="203" height="60" alt="apps_google"></a></div>

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


