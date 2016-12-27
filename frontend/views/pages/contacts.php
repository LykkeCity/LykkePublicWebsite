<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;

?>


  <article class="content">
    <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>

    <div class="inline-edit" data-page-id="<?=Yii::$app->controller->pageId?>">
      <?=$page['content']?>
    </div>
    
  </article>


<?= Footer::widget(); ?>