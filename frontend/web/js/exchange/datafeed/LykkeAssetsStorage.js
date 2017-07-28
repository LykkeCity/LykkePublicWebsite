function LykkeAssetsStorage(options) {
    this._options = $.extend(true, this.getDefaults(), options);

    this._symbols = null;
    this._pulseInProgress = false;

    if (typeof this._options.onPulse === 'function') {
        this.startPulse();
    }
}

LykkeAssetsStorage.prototype.getDictionary = function (searchString) {
    var self = this;

    var promise = $.Deferred();

    if (this._symbols === null) {
        $.get(this._options.urls.dictionary).done(function (response) {
            self._symbols = self._transformAssetPairs(response);
            promise.resolve(self._symbols);
        });
    } else {
        promise.resolve(self._symbols);
    }

    return promise.then(function (data) {
        return self._filter(data, searchString);
    });
};

LykkeAssetsStorage.prototype.getDescription = function (assets) {
    var self = this;

    // var model = {
    //     Ids: assets
    // };
    // return $.ajax({
    //     type: 'POST',
    //     url: this._options.urls.description,
    //     contentType: 'application/json',
    //     data: JSON.stringify(model),
    //     crossDomain: true
    // }).then(function (response) {
    //     return self._transformDescription(response);
    // });

    return $.Deferred().resolve(LykkeAssetsStorage._descriptionsListResponse)
        .then(function (response) {
            return self._transformDescription(response);
        })
        // temp
        .then(function (fake) {
            var result = [];

            for (var i = 0; i < fake.length; i++) {
                if (assets.indexOf(fake[i].id) !== -1) {
                    result.push(fake[i]);
                }
            }

            return result;
        });
};

LykkeAssetsStorage.prototype.startPulse = function () {
    var self = this;

    self._pulseRates();

    setInterval(function () {
        self._pulseRates();
    }, this._options.pulseDelay);
};

LykkeAssetsStorage.prototype.getDefaults = function () {
    return {
        onPulse: null,
        pulseDelay: 5000
    }
};

/*
    Service
 */
LykkeAssetsStorage.prototype._pulseRates = function () {
    var self = this;

    // semaphore
    // for case when previous operation still not completed
    if (!this._pulseInProgress) {
        this._pulseInProgress = true;

        $.get(this._options.urls.rates)
            .then(function (response) {
                return self._transformPulse(response);
            })
            .done(function (data) {
                self._options.onPulse(data);
            })
            .always(function () {
                self._pulseInProgress = false;
            });
    }
};

LykkeAssetsStorage.prototype._transformAssetPairs = function (response) {
    // Trading View compatible model
    return response.map(function (e) {
        return {
            symbol: e.id,
            full_name: e.name,
            description: e.name,
            exchange: '', // omit
            ticker: e.id,
            type: 'Lykke',
            accuracy: e.accuracy,
            invertedAccuracy: e.invertedAccuracy,

            // additional props, not used in TV
            baseAsset: e.baseAssetId,
            quotingAsset: e.quotingAssetId
        }
    });
};

LykkeAssetsStorage.prototype._transformDescription = function (response) {
    return response.Result.Descriptions.map(function (e) {
        return {
            id: e.Id,
            description: e.Description,
            issuer: e.IssuerName,
            assetClass: e.AssetClass,
            popularity: e.PopIndex
        };
    });
};

LykkeAssetsStorage.prototype._transformPulse = function (response) {
    return response;
};

LykkeAssetsStorage.prototype._filter = function (data, searchString) {
    if (!searchString) {
        return data;
    }

    searchString = searchString.toUpperCase();

    return data.filter(function (e) {
        return e.symbol.indexOf(searchString) !== -1 ||
            e.full_name.indexOf(searchString) !== -1 ||
            e.description.indexOf(searchString) !== -1;
    });
};


/*
    TEMP stuff
 */
LykkeAssetsStorage._descriptionsListResponse = {
    "Result": {
        "Descriptions": [
            {
                "Id": "AUD",
                "AssetClass": null,
                "PopIndex": 0,
                "Description": null,
                "IssuerName": "LYKKE",
                "NumberOfCoins": null,
                "MarketCapitalization": null,
                "AssetDescriptionUrl": null,
                "FullName": null
            },
            {
                "Id": "BTC",
                "AssetClass": "Cryptocurrency",
                "PopIndex": 4,
                "Description": "Bitcoin",
                "IssuerName": "BITCOIN",
                "NumberOfCoins": "15 mln",
                "MarketCapitalization": "$7 bln",
                "AssetDescriptionUrl": "http://google.com",
                "FullName": "Some full name for BitCoin"
            },
            {
                "Id": "CHF",
                "AssetClass": "FX",
                "PopIndex": 5,
                "Description": "CHF colored coins",
                "IssuerName": "LYKKE",
                "NumberOfCoins": "100k",
                "MarketCapitalization": null,
                "AssetDescriptionUrl": "https://app.zeplin.io/project.html#pid=576bf6820a30878c09ab8813&sid=57c6c7324552492b2dab316e",
                "FullName": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. qwe"
            },
            {
                "Id": "EUR",
                "AssetClass": "FX",
                "PopIndex": 5,
                "Description": "EUR colored coins",
                "IssuerName": "LYKKE",
                "NumberOfCoins": null,
                "MarketCapitalization": null,
                "AssetDescriptionUrl": null,
                "FullName": "European union Euro"
            },
            {
                "Id": "GBP",
                "AssetClass": "FX",
                "PopIndex": 4,
                "Description": "GBP colored coins",
                "IssuerName": "LYKKE",
                "NumberOfCoins": null,
                "MarketCapitalization": null,
                "AssetDescriptionUrl": null,
                "FullName": null
            },
            {
                "Id": "JPY",
                "AssetClass": "FX",
                "PopIndex": 3,
                "Description": "JPY colored coins",
                "IssuerName": "LYKKE",
                "NumberOfCoins": null,
                "MarketCapitalization": null,
                "AssetDescriptionUrl": "http://lykkex.com",
                "FullName": null
            },
            {
                "Id": "USD",
                "AssetClass": "FX",
                "PopIndex": 5,
                "Description": "USD colored coins",
                "IssuerName": "LYKKE",
                "NumberOfCoins": null,
                "MarketCapitalization": null,
                "AssetDescriptionUrl": null,
                "FullName": null
            }
        ]
    },
    "Error": null
};