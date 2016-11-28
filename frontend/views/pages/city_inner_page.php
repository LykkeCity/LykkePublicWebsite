<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;

?>
<article class="content content-block container">
  <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>

  <div class="row ">
    <div class="city_inner_page col-md-8 col-md-offset-2 col-sm-12">
      <?= $page['content'] ?>
    </div>


  </div>

</article>

<?= Footer::widget(); ?>

