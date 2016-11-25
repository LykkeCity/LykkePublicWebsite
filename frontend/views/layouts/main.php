<?php

/* @var $this \yii\web\View */
/* @var $content string */

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
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php $this->head() ?>

    <!--[if lte IE 9]>
    <script type="text/javascript" src="js/vendor/html5shiv.js"></script>
    <![endif]-->
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
                  <!--<a href="https://lykke.com/city/start?do=login" class="btn btn--stroke pull-right hidden-xs hidden-sm">Sign In</a>-->

                  <ul class="nav nav--header">
                    <!--<li>
                        <a class="dropdown__control" href="https://lykke.com/lykkewallet/" >Wallet</a>
                        <div class="dropdown__container">
                            <ul class="dropdown__nav">
                                <li ><a href="https://youtu.be/h5T2gRGcMso" target="_blank">Watch the video</a></li>
    <li><a href="https://lykke.com/lykkewallet/privacy_policy.html">Privacy Policy</a></li>
    <li><a href="https://lykke.com/city/terms_of_use">Terms of Use</a></li>
                            </ul>
                        </div>
                    </li>-->
                    <li class="_add_active_exchange">
                      <a class="dropdown__control"
                         href="https://lykke.com/exchange.php">Exchange</a>
                      <div class="dropdown__container">
                        <ul class="dropdown__nav">
                          <li><a href="https://lykke.com/lykkex_rulebook.php">LykkeX
                              Rulebook</a></li>
                          <li><a
                              href="https://lykke.com/term_conditions_colored_coins.php">Terms
                              of Issuance</a></li>
                          <li><a
                              href="https://api.lykkex.com/swagger/ui/index#/"
                              target="_blank">LykkeX API</a></li>
                          <li><a href="https://github.com/LykkeCity/"
                                 target="_blank">Github</a></li>
                          <li><a
                              href="https://lykke.com/Whitepaper_LykkeExchange.pdf">White
                              Paper</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="_add_active_city">
                      <a class="dropdown__control"
                         href="https://lykke.com/city.php">City</a>
                      <div class="dropdown__container">
                        <ul class="dropdown__nav">
                          <li><a href="https://lykke.com/city/faq">FAQ</a></li>
                          <li><a
                              href="https://lykke.com/city/about/openposition">Open
                              Positions</a></li>
                          <li><a
                              href="https://lykke.com/city/openprojects/index">Projects
                              Board</a></li>
                          <li><a href="https://lykke.com/city/lykketimes">Lykke
                              Times</a></li>
                          <li><a
                              href="https://lykke.com/city/blog/index">Blog</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="_add_active_corp"><a class="dropdown__control"
                                                    href="https://lykke.com/corp.php">Corp</a>
                      <div class="dropdown__container">
                        <ul class="dropdown__nav">
                          <li><a href="https://lykke.com/leadership.php">Leadership</a>
                          </li>
                          <li><a href="https://lykke.com/technology.php">Technology </a>
                          </li>
                          <li><a
                              href="https://lykke.com/contacts.php">Contacts</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li><a
                        href="http://blockchainexplorer.lykke.com/">Explorer</a>
                    </li>
                    <li><a href="https://streams.lykke.com/">Streams</a></li>
                    <!--<li class="hidden-xs hidden-sm">
                      <a class="btn btn-red" href="https://lykke.com/ico/">ICO</a>
                    </li>-->
                  </ul>
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

  <div class="content">
      <?=$content?>
  </div>


  <?php $this->endBody() ?>

  <script>
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


    var player;

    function onYouTubeIframeAPIReady() {
      player = new YT.Player('player', {
        videoId: 'h5T2gRGcMso',
        height: '390',
        width: '640',
        events: {
          'onReady': onPlayerReady
        }
      });
    }

    function onPlayerReady(event) {

      // bind events
      var playButton = document.getElementById("btn_video");
      playButton.addEventListener("click", function () {
        player.playVideo();

        console.log('play')

        $('.landing--video').addClass('video_played');
      });

    }
  </script>
  </body>
  </html>
<?php $this->endPage() ?>