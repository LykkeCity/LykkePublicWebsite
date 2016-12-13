<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;

?>
<article class="content content-block">
  <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>

  <? if ($page['normal_tpl'] == 1) {?>
    <div class="inline-edit row section--padding" data-page-id="<?=Yii::$app->controller->pageId?>">
      <div class="col-sm-8 automargin">
        <?=$page['content']?>
      </div>
    </div>
  <? }else{?>
    <div class="inline-edit section--padding" data-page-id="<?=Yii::$app->controller->pageId?>">
      <?=$page['content']?>
    </div>
  <?  } ?>

</article>

<?= Footer::widget(); ?>