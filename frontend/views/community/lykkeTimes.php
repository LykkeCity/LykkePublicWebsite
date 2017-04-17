<?php
use frontend\widgets\Footer;

?>

<article class="content page">
  <section class="section--padding ">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 automargin">
          <div class="text">
            <div class="inline-edit" data-page-id="11">
              <?=$blocks['Main']['content']?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</article>


<?=Footer::widget();?>


