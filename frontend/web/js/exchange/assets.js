function AssetsPage(options) {
    this._options = options;
    this._containerId = 'tv-chart-container';

    this._assets = null;

    this._tvWidget = null;
    this._tvWidgetSettings = null;

    this._lastTimeFrame = null;

    var defaultsActive = {
        baseAsset: 'BTC',
        quotingAsset: 'USD',
        inverted: false,
        period: '1D'
    };
    this._active = $.extend(true, defaultsActive, this._parseHash());

    this._initState = {
        pairs: false,
        chart: false,
        data: false,

        checkIfReady: function () {
            if (this.pairs && this.chart && this.data) {
                this.onReady();
            }
        },
        onReady: function () {
            $('.overlay').hide();
        }
    };
}

AssetsPage.prototype.init = function () {
    var self = this;

    this._templates = {
        $assetPair: $('.templates .assets-list-item')
    };
    this._containers = {
        $headerBaseAsset: $('.data-overview h2 .base-asset'),
        $headerQuotingAsset: $('.data-overview h2 .quoting-asset'),
        $advancedChartUrl: $('.advanced-chart-btn'),
        $assetsList: $('.assets-list'),
        $baseAsset: $('.asset-details.base-asset'),
        $quotingAsset: $('.asset-details.quoting-asset'),
        $tvChart: $('.tv-chart-container'),
        $noData: $('.tv-chart-no-data'),
        $periods: $('.chart-controls .periods')
    };

    this._containers.$headerBaseAsset.text(this._active.baseAsset);
    this._containers.$headerQuotingAsset.text(this._active.quotingAsset);

    this._containers.$periods.find('[data-period="' + this._active.period + '"]').parent().addClass('active');

    var pairsInterval = null;
    var opt = {
        urls: {
            dictionary: 'https://public-api.lykke.com/api/AssetPairs/dictionary',
            rates: 'https://public-api-dev.lykkex.net/api/AssetPairs/rate',
            description: 'https://lykke-api-dev.azurewebsites.net/api/Assets/description/list'
        },
        onPulse: function (data) {
            if (self._initState.pairs) {
                self._populatePairs(data);
            } else {
                // wait for pairs initialization
                pairsInterval = setInterval(function () {
                    if (self._initState.pairs) {
                        self._populatePairs(data);
                        clearInterval(pairsInterval);
                    }
                })
            }
        }
    };
    this._assets = new LykkeAssetsStorage(opt);

    var dataOpt = {
        dataUrl: 'https://lke-public-dev.azurewebsites.net/api/Candles/history/',
        onDataRecieved: function (data) {
            // data was not loaded for selected pair
            if (!self._initState.data) {
                if (data.data.length === 0) {
                    // TV not firing onChartReady if no data returned in first response
                    // manually setup chart ready flag
                    self._initState.chart = true;
                    self._containers.$tvChart.hide();
                    self._containers.$noData.show();
                }
            }
            self._initState.data = true;
            self._initState.checkIfReady();
        }
    };
    this._data = new LykkeDataStorage(dataOpt);

    this._initTVWidget();

    this._initPairs().done(function () {
        self.rerenderPage(self._active)
    });
    this._bindEvents();
};

AssetsPage.prototype.rerenderPage = function (options) {
    var self = this;

    $('.overlay').show();

    if (options.baseAsset && options.quotingAsset) {
        var symbol = options.baseAsset + options.quotingAsset;
        var invertedSymbol = options.quotingAsset + options.baseAsset;
        var normalizedSymbol = options.inverted ? invertedSymbol : symbol;

        var $pairs = this._containers.$assetsList.children();
        var $active = $pairs.filter('[data-symbol="' + normalizedSymbol + '"]');
        if (!$active.length) {
            return;
        }

        var asset = $active.data('asset');

        // prep, reset no-data message / chart visibility state
        self._containers.$tvChart.show();
        self._containers.$noData.hide();

        // update chart
        // during initial page render chart not initialized and symbol will set via chart settings
        // in other cases we set symbol here
        if (this._initState.chart) {
            this._tvWidget.activeChart().setSymbol(symbol);
            this._initState.data = false;
        }

        // update no data
        var assetName = options.inverted ? options.quotingAsset + '/' + options.baseAsset : asset.full_name;
        this._containers.$noData.find('.asset-name').text(assetName);

        // update header
        var advancedHref = this._options.advancedChartUrl + '#';
        if (options.inverted) {
            advancedHref += options.quotingAsset + '.' + options.baseAsset + '.inverted';
        } else {
            advancedHref += options.baseAsset + '.' + options.quotingAsset;
        }
        this._containers.$headerBaseAsset.text(options.baseAsset);
        this._containers.$headerQuotingAsset.text(options.quotingAsset);
        this._containers.$advancedChartUrl.attr('href', advancedHref);

        // update assets pairs list
        $pairs.removeClass('active');
        $active.addClass('active');

        // update details
        this._assets.getDescription([options.baseAsset, options.quotingAsset]).done(function (result) {
            var baseAsset = self._findAssetDescription(result, options.baseAsset);
            var quotingAsset = self._findAssetDescription(result, options.quotingAsset);

            self._populateDetails(self._containers.$baseAsset, baseAsset);
            self._populateDetails(self._containers.$quotingAsset, quotingAsset);
        });
    }

    // during initial page render chart not initialized, period will set via chart settings/options
    // in other cases we set period here
    if (this._initState.chart && options.period && this._active.period !== options.period) {
        this.setChartRange(options.period);
    }

    this._active = $.extend(true, this._active, options);
};

AssetsPage.prototype.setChartRange = function (period) {
    var chart = this._tvWidget.activeChart();

    var date = new Date();
    date.setMilliseconds(0);
    date.setSeconds(0);
    date.setMinutes(0);
    var currentTicks = date.getTime() / 1000|0;

    // With setResolution call TV not set up visible range up as expected
    // steps to repro: choose 1D => 3D => 1M (error) => 3D (error) => 1M (ok?)
    // we decided to hide 1H / 1Y and set up resolution to 1H because of we cannot set up any other resolution
    // commented code are temporal and for reference (to TV?) / future changes
    // var resolution = '';
    var range = {
        from: 0,
        to: currentTicks
    };

    var hourAgo = 60 * 60;
    var dayAgo = hourAgo * 24;
    var threeDaysAgo = dayAgo * 3;
    var monthAgo = dayAgo * 31;
    var yearAgo = 365;

    switch (period) {
        // case '1H':
        //     range.from = range.to - hourAgo;
        //     resolution = '1';
        //     break;
        case '1D':
            range.from = range.to - dayAgo;
            // resolution = '1';
            break;
        case '3D':
            range.from = range.to - threeDaysAgo;
            // resolution = '60';
            break;
        case '1M':
            range.from = range.to - monthAgo;
            // resolution = 'D';
            break;
        // case '1Y':
        //     range.from = range.to - yearAgo;
        //     resolution = '3D';
        //     break;
    }

    console.warn(new Date(range.from * 1000).toISOString(), new Date(range.to * 1000).toISOString());
    // chart.setResolution(resolution, function () {
        chart.setVisibleRange(range, function () {
            range = chart.getVisibleRange();
            console.warn(new Date(range.from * 1000).toISOString(), new Date(range.to * 1000).toISOString());
        });
    // });
};

AssetsPage.prototype._initPairs = function () {
    var self = this;

    return this._assets.getDictionary().done(function (data) {
        var $wrap = self._containers.$assetsList;
        var $virtual = $('<div />');

        for (var i = 0; i < data.length; i++) {
            var item = data[i];
            var $node = self._templates.$assetPair.clone();
            $node.find('.asset-name').text(item.full_name);
            $node.data('asset', item);
            $node.attr('data-symbol', item.baseAsset + item.quotingAsset);

            $virtual.append($node);
        }

        $wrap.append($virtual.children());

        self._initState.pairs = true;
        self._initState.checkIfReady();
    });
};

AssetsPage.prototype._populatePairs = function (data) {
    var $pairs = this._containers.$assetsList.children();
    for (var i = 0; i < $pairs.length; i++) {
        var $pair = $($pairs[i]);
        var asset = $pair.data('asset');
        var symbolData = data.filter(function (e) {
            return e.id === asset.symbol;
        });

        var bid = 'no data';
        var ask = 'no data';
        if (symbolData.length) {
            bid = symbolData[0].bid;
            ask = symbolData[0].ask;

            $pair.find('.asset-price.bid span').text(bid);
            $pair.find('.asset-price.ask span').text(ask);
            // $pairs with no data-val will not be shown in any case during search
            $pair.data('val', {
                bid: bid,
                ask: ask
            });
        } else {
            $pair.data('val', null);
            $pair.hide();
        }
    }
};

AssetsPage.prototype._populateDetails = function ($node, data) {
    $node.find('.asset-name').text(data.id);
    $node.find('.asset-details-btn');
    $node.find('.asset-prop-value.class').text(data.assetClass || '');
    var $popularity = $node.find('.asset-prop-value.popularity');
    $popularity.find('.value').text(data.popularity || '');
    $popularity.attr('data-rating', data.popularity || null); // do not use .data(), attr used in CSS
    $node.find('.asset-prop-value.description').text(data.description || '');
    $node.find('.asset-prop-value.issuer').text(data.issuer || '');
};

AssetsPage.prototype._initTVWidget = function () {
    var self = this;

    this._tvWidgetSettings = this._getTVChartSettings();

    TradingView.onready(function() {
        self._tvWidget = new TradingView.widget(self._tvWidgetSettings);
        self._tvWidget.onChartReady(function () {
            self.setChartRange(self._active.period);
            self._initState.chart = true;
            self._initState.checkIfReady();
        });
    });
};

AssetsPage.prototype._bindEvents = function () {
    var self = this;
    var $document = $(document);

    var searchTimeout = null;
    $('.search-box').on('keyup', function () {
        var val = $(this).val();
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function () {
            self._filterAssets(val);
        }, 300);
    });

    $document.on('click', '.chart-controls .periods a', function () {
        self.rerenderPage({
            period: $(this).data('period')
        });
    });

    $document.on('click', '.assets-list-item', function () {
        var asset = $(this).data('asset');

        if (self._active.baseAsset !== asset.baseAsset || self._active.quotingAsset !== asset.quotingAsset) {
            window.location.hash = asset.baseAsset + '.' + asset.quotingAsset;

            self.rerenderPage({
                baseAsset: asset.baseAsset,
                quotingAsset: asset.quotingAsset,
                inverted: false
            });

            $('body').removeClass('assets-list-opened');
        }

    });

    $document.on('click', '.data-overview h2', function () {
        window.location.hash = !self._active.inverted ?
            window.location.hash + '.inverted' :
            window.location.hash.replace('.inverted', '');

        self.rerenderPage({
            baseAsset: self._active.quotingAsset,
            quotingAsset: self._active.baseAsset,
            inverted: !self._active.inverted
        });
    });

    $('.change-asset-btn').on('click', function () {
        $('body').addClass('assets-list-opened');
    });

    $document.on('click', '.right-pane-overlay, .popup-close-btn', function () {
        $('body').removeClass('assets-list-opened');
    });

};

AssetsPage.prototype._filterAssets = function (searchString) {
    var self = this;
    var $pairs = self._containers.$assetsList.children();

    if (!searchString) {
        $pairs.each(function () {
            $(this).show();
        });
    }

    this._assets.getDictionary(searchString).done(function (data) {
        for (var i = 0; i < $pairs.length; i++) {
            var $pair = $($pairs[i]);

            // nodes with no bids / asks should be hidden anyway
            if (!$pair.data('val')) {
                $pair.hide();
                continue;
            }

            var symbol = $pair.data('asset').symbol;
            var isVisible = data.some(function (e) {
                return e.symbol === symbol;
            });
            if (isVisible) {
                $pair.show();
            } else {
                $pair.hide();
            }
        }
    });
};

AssetsPage.prototype._fixInvertedAsset = function(model) {
    if (this._active.inverted) {
        model.symbol = this._active.quotingAsset + this._active.baseAsset;
        model.inverted = this._active.inverted;
    }
};

AssetsPage.prototype._getTVChartSettings = function () {
    var self = this;
    var config = {
        supported_resolutions: ['1', '15', 'D', '3D', 'M'],
        beforeHistory: function (model) {
            self._fixInvertedAsset(model);
        },
        beforeSymbolResolve: function (model) {
            self._fixInvertedAsset(model);
        }
    };
    var storage = new LykkeTVStorageAdapter(this._data, this._assets, config);
    var datafeed = new Datafeeds.UDFCompatibleDatafeed(storage);

    return {
        fullscreen: false,
        autosize: true,
        symbol: this._active.baseAsset + this._active.quotingAsset,
        interval: '60',
        container_id: this._containerId,
        datafeed: datafeed,
        library_path: "/js/vendor/tv-charts/",
        custom_css_url: "/css/exchange/assets-chart-includes.css",
        locale: "en",
        timezone: 'UTC',
        disabled_features: [
            "use_localstorage_for_settings",
            "header_widget",
            "context_menus",
            "left_toolbar",
            "timeframes_toolbar",
            "display_market_status",
            "create_volume_indicator_by_default",
            "border_around_the_chart",
            "control_bar",
            "countdown"
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
};

AssetsPage.prototype._findAssetDescription = function (collection, id) {
    var result = collection.filter(function (e) {
        return e.id === id;
    });

    return result[0] || {
        id: id
    };
};

AssetsPage.prototype._parseHash = function () {
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