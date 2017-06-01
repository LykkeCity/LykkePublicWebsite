function LykkeStorageAdapter() {
    this._url = 'https://lke-public-dev.azurewebsites.net/api/Candles/history/';
    this._symbols = new SymbolsStorage();
}

LykkeStorageAdapter.prototype.getConfig = function () {
    // fake server call
    var deferred = $.Deferred();
    var model = {
        supports_search: true,
        supports_group_request: false,
        supports_marks: false,
        supports_timescale_marks: false,
        supports_time: false,
        exchanges: '', // omit exchanges
        symbolsTypes: '', // omit types
        supported_resolutions: ['1', '60', 'D', 'M']
    };

    return deferred.resolve(JSON.stringify(model));
};

// supports_group_request: false and supports_search: true
LykkeStorageAdapter.prototype.search = function (limit, query, type, exchange) {
    return this._symbols.get(query).then(function (result) {
        return JSON.stringify(result);
    });
};

// supports_group_request: false and supports_search: true
LykkeStorageAdapter.prototype.resolveSymbol = function (symbolName) {
    return this._symbols.get(symbolName).then(function (symbols) {
        if (symbols.length === 0) {
            return null;
        }
        var symbol = symbols[0];

        var result = {
            'name': symbol.symbol,
            'ticker': symbol.symbol,
            'description': symbol.description,
            'type': symbol.type,
            'exchange-traded': '',
            'exchange-listed': '',
            'timezone': 'America/New_York',
            'session': '0000-0000',
            'minmov': 1,
            'pricescale': 100,
            'minmov2': 0,
            'has_intraday': true,
            'has_no_volume': true,
            'supported_resolutions': ['1', '60', 'D', 'M']
        };

        return JSON.stringify(result);
    });
};

LykkeStorageAdapter.prototype.getHistory = function (symbol, from, to, resolution) {
    var self = this;
    var model = {
        dateFrom: new Date(from * 1000).toISOString(),
        dateTo: new Date(to * 1000).toISOString(),
        type: 'Bid',
        period: this._getPeriod(resolution)
    };
    return this._post(this._url + symbol, model).then(function (data) {
        return JSON.stringify(self._pivotHistoryData(data.data));
    });
};

LykkeStorageAdapter.prototype._get = function(url, params) {
    var request = url;
    if (params) {
        for (var i = 0; i < Object.keys(params).length; ++i) {
            var key = Object.keys(params)[i];
            var value = encodeURIComponent(params[key]);
            request += (i === 0 ? '?' : '&') + key + '=' + value;
        }
    }

    return $.ajax({
        type: 'GET',
        url: request,
        contentType: 'text/plain'
    });
};

LykkeStorageAdapter.prototype._post = function(url, model) {
    return $.ajax({
        type: 'POST',
        url: url,
        data: JSON.stringify(model),
        contentType: 'application/json',
        crossDomain: true
    });
};

LykkeStorageAdapter.prototype._getPeriod = function (resolution) {
    var result = 'Day';

    switch (resolution) {
        case 'S':
            result = 'Sec';
            break;
        case '1':
            result = 'Minute';
            break;
        case '60':
            result = 'Hour';
            break;
        case 'D':
            result = 'Day';
            break;
        case 'M':
            result = 'Month';
            break;
    }

    return result;
};

LykkeStorageAdapter.prototype._pivotHistoryData = function (data) {
    var result = {
        t: [], // time
        c: [], // close
        o: [], // open
        h: [], // high
        l: [], // low
        v: []  // volume
    };

    for (var i = 0; i < data.length; i++) {
        var point = data[i];
        var unixTime = new Date(point.t).getTime() / 1000;
        result.t.push(unixTime);
        result.c.push(point.c);
        result.o.push(point.o);
        result.h.push(point.h);
        result.l.push(point.l);
        result.v.push(0); // TODO
    }

    result.s = data.length === 0 ? 'no_data' : 'ok';
    return result;
};


// not used due config settings
LykkeStorageAdapter.prototype.getFullSymbolsList = function (group) {
    return null;
};

LykkeStorageAdapter.prototype.getServerTime = function() {
    return null;
};

LykkeStorageAdapter.prototype.getMarks = function (symbol, from, to, resolution) {
    return null;
};

LykkeStorageAdapter.prototype.getTimescaleMarks = function (symbol, from, to, resolution) {
    return null;
};

// only in Trading Terminal configuration
LykkeStorageAdapter.prototype.getQuotes = function (symbols) {
    return null;
};


