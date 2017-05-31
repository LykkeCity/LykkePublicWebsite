<?
use frontend\widgets\Asset;
use frontend\widgets\Footer;

?>

<article class="content">
  <section class="exchange section--padding">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-11 col-md-12 automargin exchange-inner ease-500">
          <div class="row">
            <div class="col-md-8 chart-wrap">
              <div class="data-overview">
                <h2>BTC/USD<span class="change-asset-btn">Change asset</span></h2>
                <div class="data-row">
                  <div class="asset-value-outer">
                    <span class="asset-value">1219.16</span>
                    <span class="asset-value-change">+15.18 (1.26%)</span>
                  </div>
                  <div class="asset-price-outer">
                    <span class="asset-price bid">Bid<span>1201.66</span></span>
                    <span class="asset-price ask">Ask<span>1220.04</span></span>
                  </div>
                </div>
              </div>
              <div class="chart-controls">
                <ul class="nav nav-tabs periods" role="tablist">
                  <li role="presentation" class="active">
                    <a href="#tab1"
                       aria-controls="tab1"
                       role="tab"
                       data-toggle="tab">1H</a>
                  </li>
                  <li role="presentation">
                    <a href="#tab2"
                       aria-controls="tab1"
                       role="tab"
                       data-toggle="tab">1D</a>
                  </li>
                  <li role="presentation">
                    <a href="#tab3"
                       aria-controls="tab1"
                       role="tab"
                       data-toggle="tab">3D</a>
                  </li>
                  <li role="presentation">
                    <a href="#tab4"
                       aria-controls="tab1"
                       role="tab"
                       data-toggle="tab">1M</a>
                  </li>
                  <li role="presentation">
                    <a href="#tab5"
                       aria-controls="tab1"
                       role="tab"
                       data-toggle="tab">1Y</a>
                  </li>
                </ul>
                <a class="advanced-chart-btn" href="/exchange/advanced-chart#BTCUSD">Advanced Chart</a>
              </div>

              <div id="tv-chart" class="tv-chart">
              </div>

              <span class="tv-chart-value-label">
                <p class="price"></p>
                <p class="time"></p>
              </span>

              <div class="chart-footer">
                <div class="asset-details col-sm-6">
                  <div class="row asset-details-header">
                    <div class="col-xs-6 asset-name">BTC</div>
                    <div class="col-xs-6 text-right asset-details-btn-wrap">
                      <a class="asset-details-btn">View details</a>
                    </div>
                  </div>
                  <div class="row asset-details-body">
                    <div class="col-xs-12">
                      <div class="row asset-details-row">
                        <div class="col-xs-5 asset-prop-name">Asset class</div>
                        <div class="col-xs-7 asset-prop-value">Cryptocurrency</div>
                      </div>
                      <div class="row asset-details-row">
                        <div class="col-xs-5 asset-prop-name">Popularity index</div>
                        <div class="col-xs-7 asset-prop-value">4</div>
                      </div>
                      <div class="row asset-details-row">
                        <div class="col-xs-5 asset-prop-name">Description</div>
                        <div class="col-xs-7 asset-prop-value">Bitcoin</div>
                      </div>
                      <div class="row asset-details-row">
                        <div class="col-xs-5 asset-prop-name">Issuer name</div>
                        <div class="col-xs-7 asset-prop-value">BITCOIN</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="asset-details col-sm-6">
                  <div class="row asset-details-header">
                    <div class="col-xs-6 asset-name">USD</div>
                    <div class="col-xs-6 text-right asset-details-btn-wrap">
                      <a class="asset-details-btn">View details</a>
                    </div>
                  </div>
                  <div class="row asset-details-body">
                    <div class="col-xs-12">
                      <div class="row asset-details-row">
                        <div class="col-xs-5 asset-prop-name">Asset class</div>
                        <div class="col-xs-7 asset-prop-value">FX</div>
                      </div>
                      <div class="row asset-details-row">
                        <div class="col-xs-5 asset-prop-name">Popularity index</div>
                        <div class="col-xs-7 asset-prop-value">5</div>
                      </div>
                      <div class="row asset-details-row">
                        <div class="col-xs-5 asset-prop-name">Description</div>
                        <div class="col-xs-7 asset-prop-value">US Dollar colored coins</div>
                      </div>
                      <div class="row asset-details-row">
                        <div class="col-xs-5 asset-prop-name">Issuer name</div>
                        <div class="col-xs-7 asset-prop-value">LYKKE</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 right-pane-outer ease-500">
              <div class="right-pane-overlay"></div>
              <div class="right-pane">
                <input type="text" class="search-box ease-500" placeholder="Asset name" />
                <div class="popup-close-btn">
                  <span></span>
                </div>
                <div class="assets-list-header">
                  <p>Asset Pair</p>
                </div>
                <ul class="assets-list">
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item active">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                  <li class="assets-list-item">
                    <p class="asset-name">BTC/CHF</p>
                    <span class="asset-price ask">Ask<span>1,240.14</span></span>
                    <span class="asset-price bid">Bid<span>1,243.851</span></span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</article>

<script>
</script>
<article class="content">
  <section class="exchange section--padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-md-8 automargin">
          <div class="inline-edit"
               data-page-id="<?=Yii::$app->controller->pageId?>">
            <div class="exchange_header text-center">
              <div class="exchange_header__bg">
                <img class="img-responsive"
                     src="/img/exchange.jpg"
                     alt="exchange" width="813"/>
              </div>
              <h1 class="h1"><?=$blocks['Main']['title']?></h1>
              <h2 class="h2 text-muted"><?=$blocks['Main']['content']?></h2>
            </div>
            <h3 class="h3-alt">Market Data</h3>
          </div>

          <div class="table-header">
            <div id="ratestime"
                 class="pull-right text-muted marked-data hidden-xs"></div>
            <ul class="nav nav-tabs" role="tablist">
                <? foreach ($assets as $asset) { ?>
                  <li role="presentation"
                      class="<?=$asset === reset($assets) ? 'active' : ''?>"><a
                        href="#tab_<?=$asset['name']?>"
                        aria-controls="tab_<?=$asset['name']?>"
                        role="tab"
                        data-toggle="tab"><?=$asset['name']?></a>
                  </li>
                <? } ?>
            </ul>
          </div>

          <!-- Tab panes -->
          <div class="tab-content">

              <? foreach ($assets as $asset) { ?>
                <div role="tabpanel"
                     class="tab-pane <?=$asset === reset($assets) ? 'active'
                         : ''?>"
                     id="tab_<?=$asset['name']?>">
                  <div class="table-responsive"
                       id="RatesTable<?=$asset['name']?>">
                      <?=Asset::widget(['asset' => $asset['name']])?>
                  </div>
                </div>
              <? } ?>


          </div>
        </div>
      </div>
  </section>

</article>

<?=Footer::widget();?>

<script>
    window.page = 'assets';
</script>