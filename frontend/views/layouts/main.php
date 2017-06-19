<?php
use frontend\assets\MainAsset;
use frontend\widgets\Frontend_Admin;
use frontend\widgets\SideMenu;
use frontend\widgets\Header;
use frontend\widgets\SubMenu;
use yii\helpers\Html;

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
        <title><?=Html::encode($this->title)?></title>
        <?=$this->head()?>
        <?=Html::csrfMetaTags()?>

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="apple-touch-icon" sizes="180x180"
              href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/favicon-32x32.png"
              sizes="32x32">
        <link rel="icon" type="image/png" href="/favicon-16x16.png"
              sizes="16x16">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">

        <meta name="google-site-verification" content="-3oXJnaspLel2iCBy5H0-BvOXfPJ9i1jhJEV6LQn1Lk" />


      <?php MainAsset::register($this); ?>

      <link rel="stylesheet" href="/build/styles.min.css">
        <?php $this->head() ?>



        <!--[if lte IE 9]>
        <script type="text/javascript" src="/js/vendor/html5shiv.js"></script>
        <![endif]-->

        <? if (!(isset($_COOKIE['disabled_ga_to_own_user'])) and !($_COOKIE['disabled_ga_to_own_user'] == 'true')) { ?>
            <!-- Google Analitics script -->
            <script>
                (function (i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function () {
                            (i[r].q = i[r].q || []).push(arguments)
                        }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                ga('create', 'UA-68151354-1', 'auto');
                ga('send', 'pageview');

            </script>
        <? } ?>


        <!-- Start of lykkex Zendesk Widget script -->
        <script>/*<![CDATA[*/
            window.zEmbed || function (e, t) {
                var n, o, d, i, s, a = [], r = document.createElement("iframe");
                window.zEmbed = function () {
                    a.push(arguments)
                }, window.zE = window.zE || window.zEmbed, r.src = "javascript:false", r.title = "", r.role = "presentation", (r.frameElement || r).style.cssText = "display: none", d = document.getElementsByTagName("script"), d = d[d.length - 1], d.parentNode.insertBefore(r, d), i = r.contentWindow, s = i.document;
                try {
                    o = s
                } catch (c) {
                    n = document.domain, r.src = 'javascript:var d=document.open();d.domain="' + n + '";void(0);', o = s
                }
                o.open()._l = function () {
                    var o = this.createElement("script");
                    n && (this.domain = n), o.id = "js-iframe-async", o.src = e, this.t = +new Date, this.zendeskHost = t, this.zEQueue = a, this.body.appendChild(o)
                }, o.write('<body onload="document._l();">'), o.close()
            }("https://assets.zendesk.com/embeddable_framework/main.js", "lykkex.zendesk.com");
            /*]]>*/</script>
        <!-- End of lykkex Zendesk Widget script -->

      <!-- Facebook Pixel Code -->
      <script> !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(
              n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', '1778233902505785'); fbq('track', 'PageView');
      </script>
      <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1778233902505785&ev=PageView&noscript=1"/></noscript>
      <!-- DO NOT MODIFY -->
      <!-- End Facebook Pixel Code -->

      <script src="https://www.youtube.com/iframe_api"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <script>
          var trackAppStoreLink = function(url) {
              ga('send', 'event', 'appstore', 'click', url, {
                  'transport': 'beacon',
              });
          };
          var trackPlayMarketLink = function(url) {
              ga('send', 'event', 'googleplay', 'click', url, {
                  'transport': 'beacon',
              });
          };
      </script>

    </head>
    <body class="<?=$this->params['class_body']?>">
    <?php $this->beginBody() ?>

    <?=SideMenu::widget();?>

    <?=Header::widget();?>

<!--    --><?//=SubMenu::widget(); ?>

    <?=Frontend_Admin::widget();?>

    <?=$content?>
    <?php $this->endBody() ?>

    </body>
</html>
<?php $this->endPage() ?>