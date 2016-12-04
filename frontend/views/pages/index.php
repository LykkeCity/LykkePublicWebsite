<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;

?>
<article class="content content-block container">
  <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>


  <div class="inline-edit row section--padding" data-page-id="<?=Yii::$app->controller->pageId?>">
    <?=$page['content']?>
  </div>


</article>

<?= Footer::widget(); ?>