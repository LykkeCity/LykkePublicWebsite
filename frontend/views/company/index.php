<?php
use frontend\widgets\Footer;

?>

<article class="content">
  <section class="section section--lead section--padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 automargin">
          <div class="inline-edit" data-page-id="13">
            <h1 class="text-center page__title">LykkeCorp</h1>
            <h2 class="h3 page__subtitle"><?=$blocks['Main']['title']?></h2>
            <?=$blocks['Main']['content']?>
            <p class="page__intro">&nbsp;</p>
            <div class="container">
              <section class="section section--media">
                <div class="container">
                  <div class="landing--video">
                    <div class="responsive_video">
                      <div id="player" data-video-id="Le3b6km81uc"></div>
                      <!--                                            <iframe id="player" title="YouTube video player" src="https://www.youtube.com/embed/Le3b6km81uc?enablejsapi=1&amp;origin=https://www.lykke.com&amp;widgetid=1" width="640" height="390" frameborder="0" allowfullscreen="allowfullscreen" data-video-id="Le3b6km81uc"></iframe>-->
                    </div>
                    <button id="btn_video" class="btn_video"><span
                          class="btn_video__icon"><img src="img/play.svg"
                                                       alt="play_btn"
                                                       width="50"></span> <span
                          class="btn_video__text">WATCH VIDEO</span></button>
                  </div>
                </div>
              </section>
              <section class="section section--padding section--links">
                <div class="container">
                  <h3><?=$blocks['Links']['title']?></h3>
                  <?=$blocks['Links']['content']?>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</article>

<?=Footer::widget();?>

