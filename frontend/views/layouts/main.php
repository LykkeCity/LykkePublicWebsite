<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\MainAsset;
use frontend\widgets\MainMenu;
use frontend\widgets\Social;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

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

    <?php MainAsset::register($this);?>
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
        <div class="col-xs-2 col-sm-2">
          <a href="/" class="logo header__logo">
            <img src="/img/lykke_new.svg" height="50" alt="">
          </a>
        </div>
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
            <?= Social::widget() ?>
          </div>
        </div>
      </div>
    </div>
  </header>

  <?= $content ?>

  <?php $this->endBody() ?>
  </body>
  </html>
<?php $this->endPage() ?>