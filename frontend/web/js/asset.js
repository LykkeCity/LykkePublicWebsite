$(document).ready(function () {

    setInterval(function () {
        $.ajax({
            url: 'https://lykke-public-api.azurewebsites.net/api/AssetPairs/rate',
            method: 'GET',
            type: 'json',
            success: function (data) {

                    $.each(data, function (i, v) {
                        var bid = $(".bid_" + this.id),
                            ask = $(".ask_" + this.id);

                        bid.text(this.bid);
                        ask.text(this.ask);
                    })

            }
        })

    }, 1000);

});