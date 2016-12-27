<?
use frontend\widgets\AssetPairs;
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;
use yii\helpers\Url;

?>

<article class="content">
  <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>

  <section class="exchange section--padding">
    <div class="container">
      <div class="row">

        <div class="col-sm-10 col-md-8 automargin">

          <div class="inline-edit" data-page-id="<?=Yii::$app->controller->pageId?>">
            <?= $page['content'] ?>
          </div>

          <div class="table-header">
            <div id="ratestime" class="pull-right text-muted marked-data hidden-xs"></div>
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#tab_usd" aria-controls="tab_usd" role="tab" data-toggle="tab">USD</a></li>
              <li role="presentation"><a href="#tab_chf" aria-controls="tab_chf" role="tab" data-toggle="tab">CHF</a></li>
              <li role="presentation"><a href="#tab_btc" aria-controls="tab_btc" role="tab" data-toggle="tab">BTC</a></li>
            </ul>
          </div>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="tab_usd">
              <div class="table-responsive" id="RatesTableUSD">
                <?= AssetPairs::widget(['asset' => "USD", 'pageUrl' => $page['url']]) ?>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab_chf">
              <div class="table-responsive" id="RatesTableCHF">
                <?= AssetPairs::widget(['asset' => "CHF", 'pageUrl' => $page['url']]) ?>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab_btc">
              <div class="table-responsive" id="RatesTableBTC">
                <?= AssetPairs::widget(['asset' => "BTC", 'pageUrl' => $page['url']]) ?>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

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