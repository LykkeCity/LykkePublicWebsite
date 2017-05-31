function AssetsPage() {
    this._containerId = 'tv-chart';
    this._$container = $('#' + this._containerId);

    var storage = new LykkeStorageAdapter();
    var datafeed = new Datafeeds.UDFCompatibleDatafeed(storage);

    this._tvWidget = null;
    this._tvWidgetDefaults = {
        fullscreen: false,
        autosize: true,
        symbol: 'BTCUSD',
        interval: '60',
        container_id: this._containerId,
        //	BEWARE: no trailing slash is expected in feed URL
        datafeed: datafeed,
        library_path: "/js/vendor/tv-charts/",
        custom_css_url: "/css/exchange/assets-chart-includes.css",
        locale: "en",
        disabled_features: [
            "use_localstorage_for_settings",
            "header_widget",
            "context_menus",
            "left_toolbar",
            "timeframes_toolbar",
            "display_market_status",
            "create_volume_indicator_by_default",
            "border_around_the_chart",
            "control_bar" // should be enabled?
        ],
        overrides: {
            "paneProperties.vertGridProperties.color": "transparent",
            "paneProperties.horzGridProperties.color": "#ebedef",

            "paneProperties.legendProperties.showStudyArguments": false,
            "paneProperties.legendProperties.showStudyTitles": false,
            "paneProperties.legendProperties.showStudyValues": false,
            "paneProperties.legendProperties.showSeriesTitle": false,
            "paneProperties.legendProperties.showSeriesOHLC": false,

            "scalesProperties.showLeftScale": true,
            "scalesProperties.showRightScale": false,
            "scalesProperties.backgroundColor": "rgb(0,0,0)",
            "scalesProperties.lineColor": "transparent",
            "scalesProperties.textColor": "#8c94a0",
            "scalesProperties.scaleSeriesOnly": false,

            "timeScale.rightOffset": 0,

            "mainSeriesProperties.style": 3,


            "mainSeriesProperties.showCountdown": true,
            "mainSeriesProperties.showLastValue": true,
            "mainSeriesProperties.visible": true,
            "mainSeriesProperties.showPriceLine": true,
            "mainSeriesProperties.priceLineWidth": 1,

            "mainSeriesProperties.areaStyle.color1": "#e6f6fe",
            "mainSeriesProperties.areaStyle.color2": "#e6f6fe",
            "mainSeriesProperties.areaStyle.linecolor": "#42b6f6",
            "mainSeriesProperties.areaStyle.linewidth": 1,
            "mainSeriesProperties.areaStyle.priceSource": "close",

            "symbolWatermarkProperties.color": "transparent"
        }
    };

    this._lastTimeFrame = null;
    this._$valueLabel = $('.tv-chart-value-label');

    this._active = {
        asset: '',
        period: ''
    }
}

AssetsPage.prototype.init = function () {
    this._initTVWidget();
    this._bindEvents();
};

AssetsPage.prototype._initTVWidget = function () {
    var self = this;
    TradingView.onready(function() {
        self._tvWidget = new TradingView.widget(self._tvWidgetDefaults);
        self._tvWidget.onChartReady(function () {
            self._tvWidget.activeChart().crossHairMoved(function (data) {
                // if (self._lastTimeFrame !== data.time) {
                //     self._lastTimeFrame = data.time;
                //     self._showValueLabel(data);
                //     console.log(data);
                // }
            });
        });
    });
};

AssetsPage.prototype._bindEvents = function () {
    var self = this;
    var $document = $(document);

    $('.search-box').on('keypress', function () {

    });

    $document.on('click', '.chart-controls .chart-controls periods a', function () {

    });

    $document.on('click', '.assets-list-item', function () {
        $('.assets-list-item').removeClass('active');
        $(this).addClass('active');

        $('body').removeClass('assets-list-opened');
    });

    $('.change-asset-btn').on('click', function () {
        $('body').addClass('assets-list-opened');
    });
    $document.on('click', '.right-pane-overlay, .popup-close-btn', function () {
        $('body').removeClass('assets-list-opened');
    });

};

AssetsPage.prototype._filterAssets = function (criteria) {
    console.log(criteria);
};

AssetsPage.prototype._changePeriod = function (period) {
    console.log(period);
};

AssetsPage.prototype._changeAsset = function (asset) {
    console.log(asset);
};

AssetsPage.prototype._showValueLabel = function (data) {
    this._$valueLabel.show();
    this._$valueLabel.find('.time').text(data.time);
    this._$valueLabel.find('.price').text(data.price);
};


//$(document).ready(function () {
//
//    setInterval(function () {
//        $.ajax({
//            // url: 'https://lykke-public-api.azurewebsites.net/api/AssetPairs/rate',
//            url: 'https://public-api.lykke.com/api/AssetPairs/rate',
//            method: 'GET',
//            type: 'json',
//            async: true,
//            timeout: 500,
//            success: function (data) {
//
//                    $.each(data, function (i, v) {
//                        var bid = $(".bid_" + this.id),
//                            ask = $(".ask_" + this.id);
//
//                        bid.text(this.bid == '0' ? '-' : this.bid);
//                        ask.text(this.ask == '0' ? '-' : this.ask);
//                    })
//
//            }
//        })
//
//    }, 1000);
//
//});