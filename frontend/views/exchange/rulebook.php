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
            <div class="inline-edit" data-page-id="3">
              <div class="clearfix">
                <a href="/media/lykkex.rulebook.pdf" target="_blank"
                   class="btn btn--stroke pull-right">PDF Version</a>
                <h1 class="h1"><?=$blocks['Main']['title']?></h1>
              </div>

              <p><i><?=$blocks['Main']['content']?></i></p>

              <h3><?=$blocks['Definitions']['title']?></h3>
              <p><?=$blocks['Definitions']['content']?></p>

              <h3><?=$blocks['Overview']['title']?></h3>
              <p><?=$blocks['Overview']['content']?></p>

              <h3><?=$blocks['Market participants']['title']?></h3>
              <p><?=$blocks['Market participants']['content']?></p>

              <h3><?=$blocks['Trading hours']['title']?></h3>
              <p><?=$blocks['Trading hours']['content']?></p>

              <h3><?=$blocks['Trading methods']['title']?></h3>
              <p><?=$blocks['Trading methods']['content']?></p>

              <h3><?=$blocks['Orders']['title']?></h3>
              <p><?=$blocks['Orders']['content']?></p>

              <h3><?=$blocks['Order Modification']['title']?></h3>
              <p><?=$blocks['Order Modification']['content']?></p>

              <h3><?=$blocks['Ranking of Orders']['title']?></h3>
              <p><?=$blocks['Ranking of Orders']['content']?></p>

              <h3><?=$blocks['Tick Sizes']['title']?></h3>
              <p><?=$blocks['Tick Sizes']['content']?></p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</article>

<?=Footer::widget();?>
