<?php
use frontend\widgets\ContactUs;
use frontend\widgets\Footer;

?>

<?=ContactUs::widget()?>

<article class="content page">
  <section class="section section--lead section--padding">
    <div class="container container--extend">
      <div class="row">
        <div class="col-sm-8 col-md-6 automargin">
          <div class="form_status">
            <div class="status_icon status_icon--success"></div>
            <h2><?=$blocks['Main']['title']?></h2>
            <?=$blocks['Main']['content']?>
          </div>
        </div>
      </div>
    </div>
  </section>
</article>

<?=Footer::widget();?>
