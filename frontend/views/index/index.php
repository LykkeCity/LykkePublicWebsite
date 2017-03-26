<?php
$this->params['class_body'] = "page_landing"
?>

<div class="inline-edit" data-page-id="<?=Yii::$app->controller->pageId?>">
    <?=$page['content']?>
</div>


<script>

    var RatesData = [];
    var GetAskPrice = function (ticker) {
        for (var i = 0; i < RatesData.length; i++) {
            var id = RatesData[i].id;
            if (id == ticker) {
                return RatesData[i].ask;
            } else return '';
        }
    }

    var GetBidPrice = function (ticker) {
        for (var i = 0; i < RatesData.length; i++) {
            var id = RatesData[i].id;
            if (id == ticker) {
                return RatesData[i].bid;
            } else return '';
        }
    }

    var BuildRatesTable = function (currency, table_id) {
        var date = new Date();
        for (var i = 0; i < RatesData.length; i++) {
            if (RatesData[i].id == 'EURUSD') {
                $(aEURUSD_bid).html(RatesData[i].bid);
                $(aEURUSD_ask).html(RatesData[i].ask);
            }
            var Ticker = '#' + RatesData[i].id;
            if (RatesData[i].ask != '') {
                $(Ticker).html(RatesData[i].ask);
            }
        }
    };


    var UpdateTableRates = function () {
        $.ajax({
            type: 'GET',
//                url: 'https://lykke-api.azurewebsites.net/api/AllAssetPairRates',
            url: 'https://lykke-public-api.azurewebsites.net/api/AssetPairs/rate',
            data: '',
            async: false,
            beforeSend: function (xhr) {
                if (xhr && xhr.overrideMimeType) {
                    xhr.overrideMimeType('application/json;charset=utf-8');
                }
            },
            dataType: 'json',
            success: function (data) {
                //$('#RatesJson').append(JSON.stringify(data.Result.Rates));
                RatesData = data;
                BuildRatesTable();
            },
            error: function (response, status, error) {
                //alert('error');
            }
        });
    };
    setInterval(UpdateTableRates, 1000);


</script>