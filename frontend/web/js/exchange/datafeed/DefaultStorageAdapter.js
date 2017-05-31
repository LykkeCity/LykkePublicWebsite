function DefaultStorageAdapter(url) {
    this._datafeedUrl = url;
}

DefaultStorageAdapter.prototype.getServerTime = function() {
    return this._get(this._datafeedUrl + '/time');
};

DefaultStorageAdapter.prototype.getConfig = function () {
    return this._get(this._datafeedUrl + '/config');
};

DefaultStorageAdapter.prototype.getMarks = function (symbol, from, to, resolution) {
    var model = {
        symbol: symbol,
        from: from,
        to: to,
        resolution: resolution
    };

    return this._get(this._datafeedUrl + '/marks', model);
};

DefaultStorageAdapter.prototype.getTimescaleMarks = function (symbol, from, to, resolution) {
    var model = {
        symbol: symbol,
        from: from,
        to: to,
        resolution: resolution
    };

    return this._get(this._datafeedUrl + '/timescale_marks', model);
};

// supports_group_request: false and supports_search: true
DefaultStorageAdapter.prototype.search = function (limit, query, type, exchange) {
    var model = {
        limit: limit,
        query: query,
        type: type,
        exchange: exchange
    };

    return this._get(this._datafeedUrl + '/search', model);
};

// supports_group_request: false and supports_search: true
DefaultStorageAdapter.prototype.resolveSymbol = function (symbolName) {
    var model = {
        symbol: symbolName
    };

    return this._get(this._datafeedUrl + '/symbols', model);
};

DefaultStorageAdapter.prototype.getHistory = function (symbol, from, to, resolution) {
    var model = {
        symbol: symbol,
        from: from,
        to: to,
        resolution: resolution
    };

    return this._get(this._datafeedUrl + '/history', model);
};

DefaultStorageAdapter.prototype.getQuotes = function (symbols) {
    var model = {
        symbols: symbols
    };

    return this._get(this._datafeedUrl + '/quotes', model);
};

// supports_group_request: true
DefaultStorageAdapter.prototype.getFullSymbolsList = function (group) {
    var model = {
        group: group
    };

    return this._get(this._datafeedUrl + '/symbol_info', model);
};

DefaultStorageAdapter.prototype._get = function(url, params) {
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