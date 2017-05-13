TradingView.onready(function() {
    var widget = window.tvWidget = new TradingView.widget({
        fullscreen: false,
        symbol: 'AAPL',
        interval: 'D',
        container_id: "tv_chart_container",
        //	BEWARE: no trailing slash is expected in feed URL
        datafeed: new Datafeeds.UDFCompatibleDatafeed("https://demo_feed.tradingview.com"),
        library_path: "/js/vendor/tv-charts/",
        custom_css_url: "/css/exchange/advanced-chart-includes.css",
        locale: "en",
        //	Regression Trend-related functionality is not implemented yet, so it's hidden for a while
        drawings_access: { type: 'black', tools: [ { name: "Regression Trend" } ] },
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
    });
});