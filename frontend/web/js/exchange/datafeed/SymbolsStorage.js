function SymbolsStorage() {
    this._symbols = null;
    this._url = 'https://public-api.lykke.com/api/AssetPairs/dictionary';
}

SymbolsStorage.prototype.get = function (searchString) {
    var self = this;

    var promise = $.Deferred();

    if (this._symbols === null) {
        $.get(this._url)
            .done(function (response) {
                self._symbols = self._transformToTVModel(response);

                var result = self._filter(self._symbols, searchString);
                promise.resolve(result);
            });
    } else {
        var result = this._filter(this._symbols, searchString);
        promise.resolve(result, searchString);
    }

    return promise;
};

SymbolsStorage.prototype._transformToTVModel = function (data) {
    return data.map(function (e) {
        return {
            symbol: e.id,
            full_name: e.id,
            description: e.name,
            exchange: '', // omit
            ticker: e.id,
            type: 'Lykke'
        }
    });
};

SymbolsStorage.prototype._filter = function (data, searchString) {
    if (!searchString) {
        return data;
    }

    return data.filter(function (e) {
        return e.full_name.indexOf(searchString) !== -1 ||
            e.description.indexOf(searchString) !== -1;
    });
};