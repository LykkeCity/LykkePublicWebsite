<div class="inline-edit" data-page-id="<?=Yii::$app->controller->pageId?>">
  <?=$page['content']?>
</div>



<script>

  var RatesData=[];
  var GetAskPrice=function(ticker){
    for (var i = 0 ; i < RatesData.length ; i++) {
      var id=RatesData[i].Id;
      if (id==ticker){
        return RatesData[i].Ask;
      } else return '';
    }
  }

  var GetBidPrice=function(ticker){
    for (var i = 0 ; i < RatesData.length ; i++) {
      var id=RatesData[i].Id;
      if (id==ticker){
        return RatesData[i].Bid;
      } else return '';
    }
  }

  var BuildRatesTable=function(currency, table_id){
    var date = new Date();
    for (var i = 0 ; i < RatesData.length ; i++) {
      if(RatesData[i].Id=='EURUSD'){
        //$(aEURUSD_last).html( RatesData[i].Ask);
        $(aEURUSD_bid).html( RatesData[i].Bid );
        $(aEURUSD_ask).html( RatesData[i].Ask );
      }
      var Ticker='#'+RatesData[i].Id;
      if (RatesData[i].Ask!=''){
        $(Ticker).html(RatesData[i].Ask);
      }
    }
  };


  var UpdateTableRates=function() {
    $.ajax({
      type: 'GET',
      url: 'https://lykke-api.azurewebsites.net/api/AllAssetPairRates',
      data: '',
      async: false,
      beforeSend: function (xhr) {
        if (xhr && xhr.overrideMimeType) {
          xhr.overrideMimeType('application/json;charset=utf-8');
        }
      },
      dataType: 'json',
      success: function (data){
        //$('#RatesJson').append(JSON.stringify(data.Result.Rates));
        RatesData=data.Result.Rates;
        BuildRatesTable();
      },
      error: function (response, status, error) {
        //alert('error');
      }
    });
  };
  //setInterval(UpdateTableRates, 1000);


</script>