<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;

?>
<article class="content content-block container">
  <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>

  <div class="row section--padding page">

    <?= $page['content'] ?>

    <div class="container">
      <section class="section section--media">
        <div class="container">
          <div class="landing--video">
            <div class="responsive_video">
              <div id="player"></div>
            </div>

            <button class="btn_video" id="btn_video">
              <span class="btn_video__icon"><img src="img/play.svg" width="50" alt=""></span>
              <span class="btn_video__text">WATCH VIDEO</span>
            </button>
          </div>
        </div>
      </section>

      <section class="section section--padding section--links">
        <div class="container">
          <h3>Links</h3>

          <div class="row">
            <div class="col-sm-6">
              <ul class="page__list page__list--links">
                <li><a href="/technology">Blockchain Technology</a></li>
                <li><a href="http://zh.powernet.ch/webservices/inet/HRG/HRG.asmx/getHRGHTML?chnr=0203039707&amt=020&toBeModified=0&validOnly=0&lang=4&sort=0">Commercial register of canton Zurich</a></li>
              </ul>
            </div>
            <div class="col-sm-6">
              <ul class="page__list page__list--links">
                <li><a href="https://lykke.com/Whitepaper_LykkeExchange.pdf">Lykke Exchange White Paper</a></li>
                <li><a href="https://www.coinprism.info/asset/AXkedGbAH1XGDpAypVzA5eyjegX4FaCnvM">Lykke Corp Equity on Coinprism</a></li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </div>



  </div>

</article>

<?= Footer::widget(); ?>

<script>
  var tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


  var player;

  function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
      videoId : 'Le3b6km81uc',
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
    playButton.addEventListener("click", function() {
      player.playVideo();

      console.log('play')

      $('.landing--video').addClass('video_played');
    });

  }
</script>