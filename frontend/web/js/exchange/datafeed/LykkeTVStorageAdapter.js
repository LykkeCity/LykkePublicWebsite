function LykkeTVStorageAdapter(dataStorage, symbolsStorage, config) {
    this._data = dataStorage;
    this._symbols = symbolsStorage;
    this._config = config;
    this._debug = false;
}

LykkeTVStorageAdapter.prototype.getConfig = function () {
    var deferred = $.Deferred();
    var defaultConfig = {
        supports_search: true,
        supports_group_request: false,
        supports_marks: false,
        supports_timescale_marks: false,
        supports_time: true,
        exchanges: '', // omit exchanges
        symbolsTypes: '', // omit types
        supported_resolutions: ['1', '60', 'D', 'M']
    };

    // no deep copy otherwise supported_resolutions will be bugged
    var config = $.extend(defaultConfig, this._config);
    return deferred.resolve(JSON.stringify(config));
};


LykkeTVStorageAdapter.prototype.getServerTime = function() {
    var time = new Date().getTime() / 1000 | 0;
    return $.Deferred().resolve(time);
};

LykkeTVStorageAdapter.prototype.getHistory = function (symbol, from, to, resolution) {
    var self = this;

    return this._data.getData(symbol, from, to, resolution).then(function (data) {
        if (self._debug) {
            console.warn('Data for ' + data.dateFrom + ' – ' + data.dateTo);
            if (data.data.length) {
                console.warn('First element: ' + data.data[0].t + '; Last element: ' + data.data[data.data.length - 1].t);
            }
            console.warn('Transform start: ' + new Date().toISOString() + '; Elements: ' + data.data.length);
        }
        data = self._convertDateProperties(data);
        //data = self._patchHistoryData(data);
        data = self._pivotHistoryData(data);
        if (self._debug) {
            console.warn('Transform end: ' + new Date().toISOString() + '; Elements: ' + data.t.length);
            if (data.t.length) {
                console.warn('First element: ' + new Date(data.t[0] * 1000).toISOString() + '; Last element: ' + new Date(data.t[data.t.length - 1] * 1000).toISOString());
            }
        }
        return JSON.stringify(data);
    });
};

// supports_group_request: false and supports_search: true
LykkeTVStorageAdapter.prototype.search = function (limit, query, type, exchange) {
    return this._symbols.getDictionary(query).then(function (result) {
        return JSON.stringify(result);
    });
};

// supports_group_request: false and supports_search: true
LykkeTVStorageAdapter.prototype.resolveSymbol = function (symbolName) {
    return this._symbols.getDictionary(symbolName).then(function (symbols) {
        if (symbols.length === 0) {
            return '{}';
        }
        var symbol = symbols[0];

        var result = {
            'name': symbol.symbol,
            'ticker': symbol.symbol,
            'description': symbol.description,
            'type': symbol.type,
            'exchange-traded': '',
            'exchange-listed': '',
            'timezone': 'UTC',
            'session': '0000-0000:1234567',
            'minmov': 1,
            'pricescale': 100,
            'minmov2': 0,
            'has_no_volume': true,
            'has_daily': true,
            'has_intraday': true,
            'has_empty_bars': true,
            'intraday_multipliers': ['1', '60']
        };

        return JSON.stringify(result);
    });
};

/*
    Service
 */
LykkeTVStorageAdapter.prototype._convertDateProperties = function (data) {
    for (var i = 0; i < data.data.length; i++) {
        // API returns data without trailing milliseconds and Z (UTC data in local format)
        // convert to Date objects
        data.data[i].t = new Date(data.data[i].t + '.000Z').getTime();
    }

    return data;
};
LykkeTVStorageAdapter.prototype._patchHistoryData = function (data) {
    if (data.data.length === 0) {
        return data;
    }

    var from = new Date(data.dateFrom);
    var to = new Date(data.dateTo);
    var increment = 1000 * 60 * 60;

    // ugly
    switch(data.period) {
        case 'Sec':
            break;
        case 'Minute':
            from.setSeconds(0);
            to.setSeconds(0);
            increment = 1000 * 60;
            break;
        case 'Hour':
            from.setSeconds(0);
            to.setSeconds(0);
            from.setMinutes(0);
            to.setMinutes(0);
            increment = 1000 * 60 * 60;
            break;
        case 'Day':
            from.setSeconds(0);
            to.setSeconds(0);
            from.setMinutes(0);
            to.setMinutes(0);
            increment = 1000 * 60 * 60 * 24;
            break;
        case 'Month':
            from.setSeconds(0);
            to.setSeconds(0);
            from.setMinutes(0);
            to.setMinutes(0);
            from.setHours(0);
            to.setHours(0);
            from.setDate(1);
            to.setDate(1);
            increment = 1000 * 60 * 60 * 30; // rough
            break;
    }

    var result = [];
    var elements = data.data;

    // sometimes TV requests 20-30k records
    // this chuck of code just create empty bars if no data presented for specific period (minute / hour / day / etc) in optimized way
    // weak part: timestamps should be aligned to match generating and source arrays
    from = from.getTime() + increment; // skip 1 element
    to = to.getTime();

    var tmp = {};
    for (var i = 0; i < elements.length; i++) {
        tmp[elements[i].t] = elements[i];
    }
    var last = elements[elements.length - 1].t;
    for (var time = from; time < to; time += increment) {
        result.push(tmp[time] || { t: time });
        if (time === last) {
            break;
        }
    }

    data.data = result;
    return data;
};
LykkeTVStorageAdapter.prototype._pivotHistoryData = function (data) {
    var result = {
        t: [], // time
        c: [], // close
        o: [], // open
        h: [], // high
        l: [], // low
        v: []  // volume
    };

    for (var i = 0; i < data.data.length; i++) {
        var point = data.data[i];
        var unixTime = point.t / 1000 | 0;
        result.t.push(unixTime);
        result.c.push(point.c);
        result.o.push(point.o);
        result.h.push(point.h);
        result.l.push(point.l);
    }

    result.s = data.data.length === 0 ? 'no_data' : 'ok';
    return result;
};


LykkeTVStorageAdapter.prototype.calculateHistoryDepth = function(period, resolutionBack, intervalBack) {
    // switch (period) {
    //     case '15':
    //         return {
    //             resolutionBack: 'D',
    //             intervalBack: 1
    //         };
    //     case '60':
    //         return {
    //             resolutionBack: 'D',
    //             intervalBack: 3
    //         };
    //     case 'D':
    //         return {
    //             resolutionBack: 'M',
    //             intervalBack: 1
    //         };
    //     case '3D':
    //         return {
    //             resolutionBack: 'M',
    //             intervalBack: 12
    //         };
    // }
};


// not used due config settings
LykkeTVStorageAdapter.prototype.getFullSymbolsList = function (group) {
    return null;
};

LykkeTVStorageAdapter.prototype.getMarks = function (symbol, from, to, resolution) {
    return null;
};

LykkeTVStorageAdapter.prototype.getTimescaleMarks = function (symbol, from, to, resolution) {
    return null;
};

// used only in Trading Terminal configuration
LykkeTVStorageAdapter.prototype.getQuotes = function (symbols) {
    return null;
};


