<?
use frontend\widgets\Footer;

?>

  <article class="content">

    <section class="section--padding section--lead">
      <div data-page-id="<?=Yii::$app->controller->pageId?>">
        <div class="col-sm-8 automargin">
          <h1 class="page-header"><?=$page->name?></h1>
            <? foreach ($blocks as $block) { ?>
              <div class="text">
                <h2><?=$block['title']?></h2>
                  <?=$block['content']?>
              </div>
            <? } ?>
        </div>
      </div>
    </section>

  </article>

<?=Footer::widget();?>