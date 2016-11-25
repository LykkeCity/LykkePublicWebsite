<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\widgets\MainMenu;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
  <!DOCTYPE html>
  <!--[if lt IE 7]>
  <html class="no-js lt-ie9 lt-ie8 ie7"> <![endif]-->
  <!--[if IE 8]>
  <html class="no-js lt-ie9 ie8"> <![endif]-->
  <!--[if IE 9]>
  <html class="no-js ie9"> <![endif]-->
  <!--[if gt IE 9]><!-->
  <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lykke – The Future of Markets</title>
    <?= Html::csrfMetaTags() ?>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/img/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/img/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/img/manifest.json">
    <link rel="mask-icon" href="/img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <?php $this->head() ?>

    <!--[if lte IE 9]>
    <script type="text/javascript" src="js/vendor/html5shiv.js"></script>
    <![endif]-->




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

  </head>
  <body class="page_landing new_page">
  <?php $this->beginBody() ?>

  <header class="header header--new">
    <div class="container">
      <div class="row">
        <div class="col-xs-2 col-sm-2"><a href="/"
                                          class="logo header__logo"><img
              src="/img/lykke_new.svg" height="50" alt=""></a></div>
        <div class="col-xs-10 col-sm-10 col-md-8 text-center">
          <button type="button"
                  class="navbar-toggle collapsed btn btn--stroke pull-right"
                  data-toggle="collapse" data-target="#navbar-collapse"
                  aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--a class="visible-xs visible-sm btn btn-red pull-right" href="https://lykke.com/ico">ICO</a-->
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <div class="t-simulate">
              <div class="t-row">
                <div class="t-cell">
                  <?= MainMenu::widget() ?>
                </div>
              </div>
            </div>

            <ul class="social social--header visible-xs visible-sm">
              <li><a href="https://www.linkedin.com/company/lykke-ag"
                     target="_blank" class="social__item"><i
                    class="icon_img icon_img--in"></i></a></li>
              <li><a href="https://www.facebook.com/groups/542506412568917/"
                     target="_blank" class="social__item"><i
                    class="icon_img icon_img--fb"></i></a></li>
              <li><a href="https://twitter.com/LykkeCity" target="_blank"
                     class="social__item"><i class="icon_img icon_img--tw"></i></a>
              </li>
              <li><a href="http://instagram.com/lykkecity" target="_blank"
                     class="social__item"><i
                    class="icon_img icon_img--inst"></i></a></li>
              <li><a
                  href="https://www.youtube.com/channel/UCmMYipGdKMF0kzfaE-PXsNQ"
                  target="_blank" class="social__item"><i
                    class="icon_img icon_img--yt"></i></a></li>
              <li><a href="https://www.reddit.com/r/lykke/" target="_blank"
                     class="social__item"><i class="icon icon--reddit"></i></a>
              </li>
              <li><a href="https://t.co/TmjMYnQD7T" target="_blank"
                     class="social__item"><i
                    class="icon icon--telegram"></i></a></li>
            </ul>
          </div>
        </div>

        <div class="col-sm-3">
        </div>

      </div>
    </div>
  </header>

  <?= $content ?>

  <?php $this->endBody() ?>
  </body>
  </html>
<?php $this->endPage() ?>