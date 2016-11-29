<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;

?>
<article class="content content-block container">
  <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>

  <div class="row section--padding">
    <div class="col-sm-10 col-md-8 automargin">
      <?= $page['content'] ?>

      <h3 class="h3-alt">Market Data</h3>

      <div class="table-header">
        <div id="ratestime"
             class="pull-right text-muted marked-data hidden-xs"></div>
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#tab_usd"
                                                    aria-controls="tab_usd"
                                                    role="tab"
                                                    data-toggle="tab">USD</a>
          </li>
          <li role="presentation"><a href="#tab_chf" aria-controls="tab_chf"
                                     role="tab" data-toggle="tab">CHF</a></li>
          <li role="presentation"><a href="#tab_btc" aria-controls="tab_btc"
                                     role="tab" data-toggle="tab">BTC</a></li>
        </ul>
      </div>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="tab_usd">
          <div class="table-responsive" id="RatesTableUSD">
            <table class="table">
              <tbody>
              <tr>
                <th>Asset pair</th>
                <th>Asset1</th>
                <th>Asset2</th>
                <th>Bid price</th>
                <th>Ask price</th>
              </tr>
              <tr>
                <td>BTCCHF</td>
                <td>
                  <div
                  ">BTC
          </div">
          </td>
          <td><a href="exchange_CHF.php">CHF</a></td>
          <td>737.607</td>
          <td>737.854</td>
          </tr>
          <tr>
            <td>CHFJPY</td>
            <td>
              <div
              ">CHF
        </div">
        </td>
        <td><a href="exchange_JPY.php">JPY</a></td>
        <td>111.037</td>
        <td>111.057</td>
        </tr>
        <tr>
          <td>EURCHF</td>
          <td><a href="exchange_EUR.php">EUR</a></td>
          <td><a href="exchange_CHF.php">CHF</a></td>
          <td>1.0758</td>
          <td>1.07593</td>
        </tr>
        <tr>
          <td>GBPCHF</td>
          <td><a href="exchange_GBP.php">GBP</a></td>
          <td><a href="exchange_CHF.php">CHF</a></td>
          <td>1.26056</td>
          <td>1.26084</td>
        </tr>
        <tr>
          <td>LKKCHF</td>
          <td><a href="exchange_LKK.php">LKK</a></td>
          <td><a href="exchange_CHF.php">CHF</a></td>
          <td>0.04673</td>
          <td>0.04713</td>
        </tr>
        <tr>
          <td>OTCBCCHF</td>
          <td><a href="exchange_OTC.php">OTC</a></td>
          <td><a href="exchange_BCC.php">BCC</a></td>
          <td>149.5</td>
          <td>150.5</td>
        </tr>
        <tr>
          <td>RRBCHF</td>
          <td><a href="exchange_RRB.php">RRB</a></td>
          <td><a href="exchange_CHF.php">CHF</a></td>
          <td>61.15893</td>
          <td>61.78308</td>
        </tr>
        <tr>
          <td>USDCHF</td>
          <td><a href="exchange_USD.php">USD</a></td>
          <td><a href="exchange_CHF.php">CHF</a></td>
          <td>1.00919</td>
          <td>1.00928</td>
        </tr>
        </tbody>
        </table>

      </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="tab_chf">
      <div class="table-responsive" id="RatesTableCHF"></div>
    </div>
    <div role="tabpanel" class="tab-pane" id="tab_btc">
      <div class="table-responsive" id="RatesTableBTC"></div>
    </div>
  </div>

  </div>
  </div>

</article>

<?= Footer::widget(); ?>



<script>

  var RatesData = [];
  var GetAskPrice = function (ticker) {
    for (var i = 0; i < RatesData.length; i++) {
      var id = RatesData[i].Id;
      if (id == ticker) {
        return RatesData[i].Ask;
      } else return '';
    }
  }

  var GetBidPrice = function (ticker) {
    for (var i = 0; i < RatesData.length; i++) {
      var id = RatesData[i].Id;
      if (id == ticker) {
        return RatesData[i].Bid;
      } else return '';
    }
  }

  var BuildRatesTable = function (currency, table_id) {
    var date = new Date();
    var time = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
    //$('#ratestime')[0].innerHTML=time ;


    $(table_id).find('table').remove();
    $(table_id).append($('<table class="table"/>'));
    var table$ = $(table_id).find('table').append($('<tbody/>'));
    var row$ = $('<tr/>');
    row$.append($('<th/>').html('Asset pair'));
    row$.append($('<th/>').html('Asset1'));
    row$.append($('<th/>').html('Asset2'));
    row$.append($('<th/>').html('Bid price'));
    row$.append($('<th/>').html('Ask price'));
    table$.append(row$);

    for (var i = 0; i < RatesData.length; i++) {
      var Ticker = RatesData[i].Id;
      var Asset1 = Ticker.substring(0, 3);
      var Asset2 = Ticker.substring(3, 6);

      if ((Ticker.indexOf(currency) + 1) && (!(Ticker.indexOf('ICO') + 1)) && (!(Ticker.indexOf('LKE') + 1))) {
        var row$ = $('<tr/>');
        row$.append($('<td/>').html(Ticker));
        if ((Asset1 == 'BTC') || (Asset1 == 'ETH') || (Asset1 == 'CHF'))
          row$.append($('<td/>').html('<div">' + Asset1 + '</div>'));
        else
          row$.append($('<td/>').html('<a href="exchange_' + Asset1 + '.php">' + Asset1 + '</a>'));

        if ((Asset2 == 'BTC') || (Asset2 == 'ETH') || (Asset2 == 'ETH'))
          row$.append($('<td/>').html('<div>' + Asset2 + '</div>'));
        else
          row$.append($('<td/>').html('<a href="exchange_' + Asset2 + '.php">' + Asset2 + '</a>'));
        row$.append($('<td/>').html(RatesData[i].Bid));
        row$.append($('<td/>').html(RatesData[i].Ask));
        table$.append(row$);
      }
    }
  };

  $(document).ready(function () {
    //UpdateTableRates();
   // setInterval(UpdateTableRates, 500);
  });

  var UpdateTableRates = function () {
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
      dataType: 'jsonp',
      success: function (data) {
        //$('#RatesJson').append(JSON.stringify(data.Result.Rates));
        RatesData = data.Result.Rates;
        BuildRatesTable('USD', '#RatesTableUSD');
      },
      error: function (response, status, error) {
        //alert(error);
      }
    });

    $('a[aria-controls="tab_usd"]').on('shown.bs.tab', function (e) {
      BuildRatesTable('USD', '#RatesTableUSD')
    });

    $('a[aria-controls="tab_btc"]').on('shown.bs.tab', function (e) {
      BuildRatesTable('BTC', '#RatesTableBTC')
    });
    $('a[aria-controls="tab_chf"]').on('shown.bs.tab', function (e) {
      BuildRatesTable('CHF', '#RatesTableCHF')
    });
  };
</script>