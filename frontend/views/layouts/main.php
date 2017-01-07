<?php

use frontend\assets\MainAsset;
use frontend\widgets\Frontend_Admin;
use frontend\widgets\MainMenu;
use frontend\widgets\Social;
use yii\helpers\Html;


?>
<?php $this->beginPage() ?>
  <!DOCTYPE html>
  <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 ie7"> <![endif]-->
  <!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
  <!--[if IE 9]>         <html class="no-js ie9"> <![endif]-->
  <!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lykke – The Future of Markets</title>
    <?= Html::csrfMetaTags() ?>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="manifest.json">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <?php MainAsset::register($this);?>
    <?php $this->head() ?>


    <!--[if lte IE 9]>
    <script type="text/javascript" src="js/vendor/html5shiv.js"></script>
    <![endif]-->

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-68151354-1', 'auto');
      ga('send', 'pageview');

    </script>

    <!-- Start of lykkex Zendesk Widget script -->
    <script>/*<![CDATA[*/window.zEmbed||function(e,t){var n,o,d,i,s,a=[],r=document.createElement("iframe");window.zEmbed=function(){a.push(arguments)},window.zE=window.zE||window.zEmbed,r.src="javascript:false",r.title="",r.role="presentation",(r.frameElement||r).style.cssText="display: none",d=document.getElementsByTagName("script"),d=d[d.length-1],d.parentNode.insertBefore(r,d),i=r.contentWindow,s=i.document;try{o=s}catch(c){n=document.domain,r.src='javascript:var d=document.open();d.domain="'+n+'";void(0);',o=s}o.open()._l=function(){var o=this.createElement("script");n&&(this.domain=n),o.id="js-iframe-async",o.src=e,this.t=+new Date,this.zendeskHost=t,this.zEQueue=a,this.body.appendChild(o)},o.write('<body onload="document._l();">'),o.close()}("https://assets.zendesk.com/embeddable_framework/main.js","lykkex.zendesk.com");
      /*]]>*/</script>
    <!-- End of lykkex Zendesk Widget script -->


  </head>
<body class="<?=$this->params['class_body']?>">
  <?php $this->beginBody() ?>

  <header class="header">
    <div class="container">
      <div class="row">
        <div class="col-xs-2 col-sm-2"><a href="/" class="logo header__logo"><img src="/img/lykke_new.svg" height="50" alt=""/></a></div>
        <div class="col-xs-10 col-sm-10 col-md-8 text-center">
          <button type="button" class="navbar-toggle collapsed btn btn--stroke pull-right" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
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

        <div class="col-sm-3">
        </div>

      </div>
    </div>
  </header>
  <?=Frontend_Admin::widget();?>

      <?= $content ?>

  <?php $this->endBody() ?>

  </body>
  </html>
<?php $this->endPage() ?>