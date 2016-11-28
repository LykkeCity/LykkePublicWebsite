<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;

?>
<article class="content content-block container">
  <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>

  <div class="row section--padding">
    <?= $page['content'] ?>
  </div>

</article>

<?= Footer::widget(); ?>