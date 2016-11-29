<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;
use yii\helpers\Url;

?>
  <article class="content content-block container">
    <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>

    <div class="row ">
      <div class="blog blog_post col-md-10 col-md-offset-1 col-sm-12">
        <?= $post['post_text'] ?>
      </div>

  </article>

<?= Footer::widget(); ?>