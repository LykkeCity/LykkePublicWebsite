function LykkeDataStorage(options) {
    this._options = $.extend(true, this.getDefaults(), options);
}

LykkeDataStorage.prototype.getData = function (symbol, from, to, resolution) {
    var self = this;
    var model = {
        dateFrom: this._ticksToDate(from),
        dateTo: this._ticksToDate(to),
        type: this._options.type,
        period: this._resolutionToPeriod(resolution)
    };

    return $.ajax({
        type: 'POST',
        url: this._options.dataUrl + symbol,
        contentType: 'application/json',
        data: JSON.stringify(model),
        crossDomain: true
    }).done(function (data) {
        if (typeof self._options.onDataRecieved === 'function') {
            self._options.onDataRecieved(data);
        }
    });
};

LykkeDataStorage.prototype.getDefaults = function () {
    return {
        onDataReceived: null,
        type: 'Bid'
    };
};

/*
 Service
 */
LykkeDataStorage.prototype._resolutionToPeriod = function (resolution) {
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

LykkeDataStorage.prototype._ticksToDate = function (ticks) {
    return new Date(ticks * 1000).toISOString()
};