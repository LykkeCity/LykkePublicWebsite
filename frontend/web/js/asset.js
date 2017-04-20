$(document).ready(function () {

    setInterval(function () {
        $.ajax({
            // url: 'https://lykke-public-api.azurewebsites.net/api/AssetPairs/rate',
            url: 'https://public-api.lykke.com/api/AssetPairs/rate',
            method: 'GET',
            type: 'json',
            async: true,
            timeout: 500,
            success: function (data) {

                    $.each(data, function (i, v) {
                        var bid = $(".bid_" + this.id),
                            ask = $(".ask_" + this.id);

                        bid.text(this.bid == '0' ? '-' : this.bid);
                        ask.text(this.ask == '0' ? '-' : this.ask);
                    })

            }
        })

    }, 1000);

});