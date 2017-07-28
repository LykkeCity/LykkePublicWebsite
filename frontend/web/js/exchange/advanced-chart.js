function AdvancedChartPage(options) {
    var self = this;

    this._tvWidget = null;

    var defaultsActive = {
        baseAsset: 'BTC',
        quotingAsset: 'USD',
        inverted: false,
        period: '1D'
    };
    this._active = $.extend(true, defaultsActive, this._parseHash());

    var opt = {
        urls: {
            dictionary: 'https://public-api.lykke.com/api/AssetPairs/dictionary',
            rates: 'https://public-api-dev.lykkex.net/api/AssetPairs/rate',
            description: 'https://lykke-api-dev.azurewebsites.net/api/Assets/description/list'
        }
    };
    var assets = new LykkeAssetsStorage(opt);

    var dataOpt = {
        dataUrl: 'https://lke-public-dev.azurewebsites.net/api/Candles/history/'
    };
    var adapterOpt = {
        beforeHistory: function (model) {
            self._fixInvertedAsset(model);
        },
        beforeSymbolResolve: function (model) {
            if (self._programSymbolChange) {
                self._fixInvertedAsset(model);
            }
        }
    };
    var data = new LykkeDataStorage(dataOpt);
    var storage = new LykkeTVStorageAdapter(data, assets, adapterOpt);
    var datafeed = new Datafeeds.UDFCompatibleDatafeed(storage);

    this._tvWidgetDefaults = {
        fullscreen: false,
        autosize: true,
        symbol: this._active.baseAsset + this._active.quotingAsset,
        interval: '60',
        container_id: "tv-advanced-chart",
        //	BEWARE: no trailing slash is expected in feed URL
        datafeed: datafeed,
        library_path: "/js/vendor/tv-charts/",
        custom_css_url: "/css/exchange/advanced-chart-includes.css",
        locale: "en",
        //	Regression Trend-related functionality is not implemented yet, so it's hidden for a while
        drawings_access: {
            type: 'black',
            tools: [{
                name: "Regression Trend"
            }]
        },
        disabled_features: [
            "use_localstorage_for_settings",
            "header_settings",
            "header_indicators",
            "header_screenshot",
            "header_fullscreen_button",
            "header_saveload",
            "format_button_in_legend",
            "edit_buttons_in_legend",
            "main_series_scale_menu",
            "show_chart_property_page",
            "timezone_menu"
        ]
    };
}

AdvancedChartPage.prototype.init = function () {
    var self = this;

    this._programSymbolChange = true;
    TradingView.onready(function() {
        self._tvWidget = new TradingView.widget(self._tvWidgetDefaults);
        self._tvWidget.onChartReady(function () {
            self._programSymbolChange = false;
            self._addAssetsSwitchButton();
            self._tvWidget.activeChart().onSymbolChanged().subscribe(null, function (data) {
                if (self._programSymbolChange) {
                    self._programSymbolChange = false;
                    return;
                }

                self._active.baseAsset = data.baseAsset;
                self._active.quotingAsset = data.quotingAsset;
                self._active.inverted = false;

                self._updateHash();
            });
        });
    });
};

AdvancedChartPage.prototype._addAssetsSwitchButton = function () {
    var self = this;

    var $iframe = $('.tv-advanced-chart iframe').contents();
    var $node = $('<div class="group space-single header-group-switch-assets"><a class="button toggle-caption"><img src="/img/exchange/switch-icon.svg" alt="Switch Assets" /></a></div>');

    $node.on('click', function () {
        var tmp = self._active.baseAsset;
        self._active.baseAsset = self._active.quotingAsset;
        self._active.quotingAsset = tmp;
        self._active.inverted = !self._active.inverted;

        self._updateHash();

        self._programSymbolChange = true;
        self._tvWidget.activeChart().setSymbol(self._active.baseAsset + self._active.quotingAsset);
    });
    $iframe.find('.header-group-intervals').after($node)
};

AdvancedChartPage.prototype._fixInvertedAsset = function(model) {
    var opt = this._active;

    if (opt.inverted) {
        model.symbol = opt.quotingAsset + opt.baseAsset;
        model.inverted = opt.inverted;
    }
};

AdvancedChartPage.prototype._updateHash = function () {
    var options = this._active;
    var hash = '#';

    if (options.inverted) {
        hash += options.quotingAsset + '.' + options.baseAsset + '.inverted';
    } else {
        hash += options.baseAsset + '.' + options.quotingAsset;
    }

    window.location.hash = hash;
};

AdvancedChartPage.prototype._parseHash = function () {
    var hash = window.location.hash.replace('#', '');
    var result = {};

    var elements = hash.split('.');
    if (elements.length > 1) {
        if (elements.length === 3 && elements[2] === 'inverted') {
            result.baseAsset = elements[1];
            result.quotingAsset = elements[0];
            result.inverted = true;
        } else {
            result.baseAsset = elements[0];
            result.quotingAsset = elements[1];
            result.inverted = false;
        }
    }

    return result;
};

