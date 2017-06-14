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
                                <h2 class="asset-name"></h2>
                                <span class="change-asset-btn">Change asset</span>
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
                            <div class="chart-controls clearfix">
                                <ul class="nav nav-tabs periods" role="tablist">
<!--                                    <li role="presentation">-->
<!--                                        <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">1H</a>-->
<!--                                    </li>-->
                                    <li role="presentation">
                                        <a href="#tab2" aria-controls="tab1" role="tab" data-toggle="tab" data-period="1D">1D</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#tab3" aria-controls="tab1" role="tab" data-toggle="tab" data-period="3D">3D</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#tab4" aria-controls="tab1" role="tab" data-toggle="tab" data-period="1M">1M</a>
                                    </li>
<!--                                    <li role="presentation">-->
<!--                                        <a href="#tab5" aria-controls="tab1" role="tab" data-toggle="tab">1Y</a>-->
<!--                                    </li>-->
                                </ul>
                                <a class="advanced-chart-btn" target="_blank">Advanced Chart</a>
                            </div>

                            <div class="tv-chart">
                                <div class="tv-chart-no-data">
                                    <p class="asset-name">BTC-USD</p>
                                    <p class="no-data-message">No history data available</p>
                                </div>
                                <div id="tv-chart-container" class="tv-chart-container"></div>
                            </div>

                            <div class="section-subheader-wrap">
                                <h3 class="section-subheader">Assets Description</h3>
                            </div>
                            <div class="chart-footer row">
                                <div class="asset-details base-asset col-sm-6">
                                    <div class="row asset-details-header">
                                        <a class="asset-details-btn" target="_blank">
                                            <span class="asset-name"></span>
                                            <img src="/img/exchange/box-icon.svg" alt="View Details" />
                                        </a>
                                    </div>
                                    <div class="row asset-details-body">
                                        <div class="col-xs-12">
                                            <div class="row asset-details-row">
                                                <div class="col-xs-5 asset-prop-name">Asset class</div>
                                                <div class="col-xs-7 asset-prop-value class"></div>
                                            </div>
                                            <div class="row asset-details-row">
                                                <div class="col-xs-5 asset-prop-name">Popularity index</div>
                                                <div class="col-xs-7 asset-prop-value popularity">
                                                    <p class="value"></p>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row asset-details-row">
                                                <div class="col-xs-5 asset-prop-name">Description</div>
                                                <div class="col-xs-7 asset-prop-value description"></div>
                                            </div>
                                            <div class="row asset-details-row">
                                                <div class="col-xs-5 asset-prop-name">Issuer name</div>
                                                <div class="col-xs-7 asset-prop-value issuer"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="asset-details quoting-asset col-sm-6">
                                    <div class="row asset-details-header">
                                        <a class="asset-details-btn" target="_blank">
                                            <span class="asset-name"></span>
                                            <img src="/img/exchange/box-icon.svg" alt="View Details" />
                                        </a>
                                    </div>
                                    <div class="row asset-details-body">
                                        <div class="col-xs-12">
                                            <div class="row asset-details-row">
                                                <div class="col-xs-5 asset-prop-name">Asset class</div>
                                                <div class="col-xs-7 asset-prop-value class"></div>
                                            </div>
                                            <div class="row asset-details-row">
                                                <div class="col-xs-5 asset-prop-name">Popularity index</div>
                                                <div class="col-xs-7 asset-prop-value popularity">
                                                    <p class="value"></p>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row asset-details-row">
                                                <div class="col-xs-5 asset-prop-name">Description</div>
                                                <div class="col-xs-7 asset-prop-value description"></div>
                                            </div>
                                            <div class="row asset-details-row">
                                                <div class="col-xs-5 asset-prop-name">Issuer name</div>
                                                <div class="col-xs-7 asset-prop-value issuer"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 right-pane-outer ease-500">
                            <div class="right-pane-overlay"></div>
                            <div class="right-pane">
                                <div class="search-box-wrap">
                                    <input type="text" class="search-box ease-500" placeholder="Asset name" />
                                </div>
                                <div class="popup-close-btn">
                                    <span></span>
                                </div>
                                <p class="assets-list-header">Asset Pair</p>
                                <ul class="assets-list">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

<div class="templates" style="display: none;">
    <ul>
        <li class="assets-list-item">
            <p class="asset-name"></p>
            <span class="asset-price bid">Bid<span></span></span>
            <span class="asset-price ask">Ask<span></span></span>
        </li>
    </ul>
</div>

<?=Footer::widget();?>

<script>
    window.page = {
        name: 'assets',
        options: {
            advancedChartUrl: '/exchange/advanced-chart',
            details: '/details'
        }
    };
</script>