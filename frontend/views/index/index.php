<?php
$this->params['class_body'] = "page_landing"
?>

<article class="content landing">
  <section class="section landing--intro section--padding">
    <div class="container">
      <div class="landing_intro">
        <h1 class="landing_intro__title"><?=$blocks['Main']['title']?></h1>
        <h2 class="h3 h3--opacity"><?=$blocks['Main']['content']?></h2>
        <div class="trading_data">
          <div class="trading_data__item trading_data__item--iphone">
            <div class="trading_data__inner">
              <img src="img/landing/iphone_inner.png" width="375" alt="iphone_inner">
              <div class="trading_data__content">
                <div class="trading_data__table">
                  <table>
                    <tr>
                      <th>Issuer/asset</th>
                      <th>Price</th>
                    </tr>
                    <tr>
                      <td>BTC <span class="invert_icn"></span> USD</td>
                      <td><span class="trading_data__label">$ <span id="BTCUSD" class="val">606.71</span></span></td>
                    </tr>
                    <tr>
                      <td>EUR <span class="invert_icn"></span> USD</td>
                      <td><span class="trading_data__label">$ <span id="EURUSD" class="val">1.1234</span></span></td>
                    </tr>
                    <tr>
                      <td>GBP <span class="invert_icn"></span> USD</td>
                      <td><span class="trading_data__label">$ <span id="GBPUSD" class="val">1.33372</span></span></td>
                    </tr>
                    <tr>
                      <td>LYKKE <span class="invert_icn"></span> USD</td>
                      <td><span class="trading_data__label">$ <span  id="LKKUSD" class="val">0.05143</span></span></td>
                    </tr>
                    <tr>
                      <td>USD <span class="invert_icn"></span> CHF</td>
                      <td><span class="trading_data__label">₣ <span id="USDCHF" class="val">0.9723</span></span></td>
                    </tr>
                    <tr>
                      <td>USD <span class="invert_icn"></span> JPY</td>
                      <td><span class="trading_data__label">¥ <span id="USDJPY" class="val">101.856</span></span></td>
                    </tr>
                    <tr>
                      <td>ETH <span class="invert_icn"></span> USD</td>
                      <td><span class="trading_data__label">$ <span id="ETHUSD" class="val">11.98</span></span></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="trading_data__item trading_data__item--android">
            <div class="trading_data__inner">
              <img src="img/landing/android_inner.jpg" width="360" alt="android_inner">
              <div id="aEURUSD_bid" class="trading_data__sell">1.10432</div>
              <div id="aEURUSD_ask" class="trading_data__buy">1.11528</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section landing--features section--padding">
    <div class="container">
      <div class="col-sm-8 automargin">
        <div class="row landing_features_title">
          <div class="col-sm-5">
            <div class="h1 page__title">Lykke<span>Wallet</span></div>
          </div>
          <div class="col-sm-7">
            <div class="apps pull-right">
              <div class="apps_apple"><a onclick="trackAppStoreLink('https://appsto.re/ru/Dwjvcb.i');" href="https://appsto.re/ru/Dwjvcb.i" target="_blank"><img src="img/appstore-badge.svg" width="170" alt="apps_apple"></a></div>
              <div class="apps_google"><a onclick="trackPlayMarketLink('https://play.google.com/store/apps/details?id=com.lykkex.LykkeWallet');" href="https://play.google.com/store/apps/details?id=com.lykkex.LykkeWallet" target="_blank"><img src="img/google-play.svg" width="170" alt="apps_google"></a></div>
            </div>
          </div>
        </div>

        <p class="landing__subtitle"><?=$blocks['LykkeWallet']['content']?></p>

        <div class="features">
          <div class="features__item features__item--dur1">
            <div class="features__img"><img src="img/landing/icn/comisssion_free_icn.svg" width="70" alt="comisssion_free"></div>
            <div class="features__title">0% commission</div>
            <div class="features__text">Zero broker commission.</div>
          </div>
          <div class="features__item features__item--dur2">
            <div class="features__img"><img src="img/landing/icn/low_spreads_icn.svg" width="62" alt="low_spreads"></div>
            <div class="features__title">low spreads</div>
            <div class="features__text">Matching engine with spread priority.</div>
          </div>
          <div class="features__item features__item--dur3">
            <div class="features__img"><img src="img/landing/icn/guaranteed_execution_icn.svg" width="80" alt="guaranteed_execution"></div>
            <div class="features__title">guaranteed execution</div>
            <div class="features__text">Trading at human speed. Best execution guaranteed!</div>
          </div>
          <div class="features__item features__item--dur4">
            <div class="features__img"><img src="img/landing/icn/immediate_settlement_icn.svg" width="63" alt="immediate_settlement"></div>
            <div class="features__title">immediate settlement</div>
            <div class="features__text">Your trade is settled in minutes.</div>
          </div>
          <div class="features__item features__item--dur5">
            <div class="features__img"><img src="img/landing/icn/direct_ownership_icn.svg" width="70" alt="direct_ownership"></div>
            <div class="features__title">direct ownership</div>
            <div class="features__text">Guaranteed by the blockchain.</div>
          </div>
          <div class="features__item features__item--dur6">
            <div class="features__img"><img src="img/landing/icn/security_icn.svg" width="60" alt="security"></div>
            <div class="features__title">100% security</div>
            <div class="features__text">Orders are approved by fingerprint. Your private key is stored on the device.</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="landing--video">
        <div class="responsive_video">
          <div id="player" data-video-id="h5T2gRGcMso"></div>
          <!--<iframe width="100%" id="video" height="315" src="https://www.youtube.com/embed/h5T2gRGcMso?enablejsapi=1" frameborder="0" allowfullscreen></iframe>-->
        </div>

        <button class="btn_video" id="btn_video">
          <span class="btn_video__icon"><img src="img/play.svg" width="50" alt="play_icn"></span>
          <span class="btn_video__text">WATCH VIDEO</span>
        </button>
      </div>
    </div>
  </section>

  <section class="section landing--qa section--padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-11 automargin">
          <h3 class="h2">Questions & Answers</h3>

          <div class="qa">
            <div class="row">
              <div class="col-sm-6 col-xs-12">
                <div class="qa_item">
                  <div class="qa_item__num">01</div>
                  <div class="qa_item__title">What is Lykke Wallet?</div>
                  <div class="qa_item__text">
                    It's like your normal wallet or purse, only it's electronic. You use it to hold your money in different currencies. It's very practical: You can exchange one currency into another, and you don't need to go to a bank or an exchange to do it. Your wallet is linked to the Lykke Exchange. You can buy shares with it and even issue your own.
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xs-12">
                <div class="qa_item">
                  <div class="qa_item__num">02</div>
                  <div class="qa_item__title">Why would I need it?</div>
                  <div class="qa_item__text">
                    <p>You need Lykke Wallet if:</p>
                    <ol>
                      <li>You want to invest your money in different currencies.</li>
                      <li>You want to buy shares.</li>
                      <li>You want to issue your own shares.</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-xs-12">
                <div class="qa_item">
                  <div class="qa_item__num">03</div>
                  <div class="qa_item__title">What do I need to pay for?</div>
                  <div class="qa_item__text">
                    Nothing. There is no charge to use Lykke Wallet, and the commission rate is 0 percent.
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xs-12">
                <div class="qa_item">
                  <div class="qa_item__num">04</div>
                  <div class="qa_item__title">How can I start using Lykke Wallet?</div>
                  <div class="qa_item__text">
                    <ol>
                      <li>Download the free <a href="https://appsto.re/ru/Dwjvcb.i" target="_blank">iOS</a> or <a href="https://play.google.com/store/apps/details?id=com.lykkex.LykkeWallet" target="_blank">Android app</a>.</li>
                      <li>Register your Lykke Wallet.</li>
                      <li>Put some money into your wallet: Deposit bitcoins, transfer funds from a bank card or e-wallet, or make a bank wire transfer.</li>
                      <li>Start trading!</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-xs-12">
                <div class="qa_item">
                  <div class="qa_item__num">05</div>
                  <div class="qa_item__title">What if I am no good in technology?</div>
                  <div class="qa_item__text">
                    You don’t need any special knowledge. If you use the Internet, social media, online banking, or other apps on your smartphone, you are skilled enough to manage your Lykke Wallet.
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xs-12">
                <div class="qa_item">
                  <div class="qa_item__num">06</div>
                  <div class="qa_item__title">Is it safe to put my money into Lykke Wallet?</div>
                  <div class="qa_item__text">
                    Unlike on traditional exchanges, you don’t need to trust your money to the marketplace. Lykke Wallet is a multisignature wallet, which is like a safe with two keys. You have one key, and the exchange has the other. No one can take your money, even if your personal key is stolen.
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-xs-12">
                <div class="qa_item">
                  <div class="qa_item__num">07</div>
                  <div class="qa_item__title">What if anything happens to the exchange? </div>
                  <div class="qa_item__text">
                    When you put your money into a Lykke Wallet, Lykke emails you a signed refund transaction. If the exchange is compromised, you’ll get your money back within two weeks.
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xs-12">
                <div class="qa_item">
                  <div class="qa_item__num">08</div>
                  <div class="qa_item__title">How can I get my money out of Lykke Wallet?</div>
                  <div class="qa_item__text">
                    You can withdraw your money to your account at any time without paying a fee.
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>

  </section>

  <section class="landing landing--apps section--padding">
    <div class="container">
      <div class="col-sm-6 col-md-5">
        <div class="h2">Download now</div>
        <div class="h3 h3--opacity">It’s free</div>
      </div>
      <div class="col-sm-6 col-md-7">
        <div class="apps">
          <div class="apps_apple"><a onclick="trackAppStoreLink('https://appsto.re/ru/Dwjvcb.i');" href="https://appsto.re/ru/Dwjvcb.i" target="_blank"><img src="img/appstore-badge.svg" width="203" alt="appstore"></a></div>
          <div class="apps_google"><a onclick="trackPlayMarketLink('https://play.google.com/store/apps/details?id=com.lykkex.LykkeWallet');" href="https://play.google.com/store/apps/details?id=com.lykkex.LykkeWallet" target="_blank"><img src="img/google-play.svg" width="203" alt="googleplay"></a></div>
        </div>
      </div>
    </div>
  </section>

  <section class="landing landing--info section--padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-11 automargin">
          <ul class="social social--footer_alt">
            <li><a href="https://www.facebook.com/groups/542506412568917/" target="_blank" class="social__item"><i class="icon icon--fb_simple"></i></a></li>
            <li><a href="https://twitter.com/LykkeCity" target="_blank" class="social__item"><i class="icon icon--tw"></i></a></li>
            <li><a href="http://instagram.com/lykkecity" target="_blank" class="social__item"><i class="icon icon--instagram"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCmMYipGdKMF0kzfaE-PXsNQ" target="_blank" class="social__item"><i class="icon icon--youtube"></i></a></li>
            <li><a href="https://www.linkedin.com/company/lykke-ag" target="_blank" class="social__item"><i class="icon icon--linkedin-icn"></i></a></li>
            <li><a href="https://www.reddit.com/r/lykke/" target="_blank" class="social__item"><i class="icon icon--reddit"></i></a></li>
            <li><a href="https://t.co/TmjMYnQD7T" target="_blank" class="social__item"><i class="icon icon--telegram"></i></a></li>
          </ul>

          <div class="landing__text">
            <div class="row">
              <div class="col-md-6">
                <p>Trading financial products involves significant risk and can result in the loss of your invested capital. You should not invest more than you can afford to lose, and you should ensure that you fully understand the risks involved. Trading leveraged products may not be suitable for all investors. Before trading, please take into consideration your level of experience and investment objectives, and seek independent financial advice if necessary. It is the responsibility of you, the client, to ascertain whether you are permitted to use the services of Lykke Vanuatu Limited based on the legal requirements in your country of residence.</p>
                <p>Spot FX trading is provided by Lykke Corp UK. Leveraged FX & CFD trading is only available to Lykke Vanuatu clients who reside in Asian and African countries. Lykke services are not available to the residents of United States, Canada, Japan, and Australia. </p>
              </div>
              <div class="col-md-6">
                <p><strong>Lykke Corp (Lykke AG)</strong> is registered in Zug, Switzerland, with identification number <a href="https://zg.chregister.ch/cr-portal/auszug/auszug.xhtml?uid=CHE-345.258.499">CHE-345.258.499</a> (<a href="/CHE-345.258.499.pdf">pdf</a>).</p>
                <p><strong>Lykke Corp UK Limited</strong> is a company registered in England with number 10093552, limited by shares. The registered office is located at 86-90 Paul Street, London EC2A 4NE.</p>
                <p><strong>Lykke Vanuatu Limited</strong> is regulated by the Vanuatu Financial Services Commission (VFSC) of Vanuatu with company number&nbsp;17909.</p>
                <p>&copy; 2017 Lykke. All rights reserved.</p>
              </div>
            </div>

            <hr>

            <p><b>Risk warning.</b> Trading leveraged products can result in losses that exceed your deposits. Ensure you understand the risks. Please read <a href="https://lykke.com/city/terms_of_use">Terms of Use</a> and <a href="https://lykke.com/city/privacy_policy">Privacy Policy</a>.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</article>

<script>

    var RatesData = [];
    var GetAskPrice = function (ticker) {
        for (var i = 0; i < RatesData.length; i++) {
            var id = RatesData[i].id;
            if (id == ticker) {
                return RatesData[i].ask;
            } else return '';
        }
    };

    var GetBidPrice = function (ticker) {
        for (var i = 0; i < RatesData.length; i++) {
            var id = RatesData[i].id;
            if (id == ticker) {
                return RatesData[i].bid;
            } else return '';
        }
    };

    var BuildRatesTable = function (currency, table_id) {
        var date = new Date();
        for (var i = 0; i < RatesData.length; i++) {
            if (RatesData[i].id == 'EURUSD') {
                $(aEURUSD_bid).html(RatesData[i].bid);
                $(aEURUSD_ask).html(RatesData[i].ask);
            }
            var Ticker = '#' + RatesData[i].id;
            if (RatesData[i].ask != '') {
                $(Ticker).html(RatesData[i].ask);
            }
        }
    };


    var UpdateTableRates = function () {
        $.ajax({
            type: 'GET',
//                url: 'https://lykke-api.azurewebsites.net/api/AllAssetPairRates',
//            url: 'https://lykke-public-api.azurewebsites.net/api/AssetPairs/rate',
            url: 'https://public-api.lykke.com/api/AssetPairs/rate',
            data: '',
            async: true,
            timeout: 500,
            beforeSend: function (xhr) {
                if (xhr && xhr.overrideMimeType) {
                    xhr.overrideMimeType('application/json;charset=utf-8');
                }
            },
            dataType: 'json',
            success: function (data) {
                //$('#RatesJson').append(JSON.stringify(data.Result.Rates));
                RatesData = data;
                BuildRatesTable();
            },
            error: function (response, status, error) {
                //alert('error');
            }
        });
    };
    setInterval(UpdateTableRates, 1000);


</script>