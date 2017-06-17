<?php
use frontend\widgets\Footer;
use frontend\widgets\SubMenu;

?>

<?=SubMenu::widget()?>

<article class="content page">
  <section class="section--padding ">
    <div class="container">
      <div class="row">

        <div class="col-sm-8 automargin">
          <div class="text">
            <div class="inline-edit" data-page-id="9">
              <h1 id="frequently_asked_questions"
                  class="sectionedit1 page-header"><?=$blocks['Main']['title']?></h1>
              <h2 id="about_lykke"
                  class="sectionedit2"><?=$blocks['FAQ']['title']?></h2>
              <?=$blocks['FAQ']['content']?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</article>

<?=Footer::widget();?>
