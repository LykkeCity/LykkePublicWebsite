function AdvancedChartPage(options) {
    this._tvWidget = null;

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
    var data = new LykkeDataStorage(dataOpt);
    var storage = new LykkeTVStorageAdapter(data, assets);
    var datafeed = new Datafeeds.UDFCompatibleDatafeed(storage);

    var symbol = 'BTCUSD';
    if (window.location.hash) {
        symbol = window.location.hash.replace('#', '');
    }
    this._tvWidgetDefaults = {
        fullscreen: false,
        autosize: true,
        symbol: symbol,
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
    TradingView.onready(function() {
        self._tvWidget = new TradingView.widget(self._tvWidgetDefaults);
    });
};

