<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;
use yii\helpers\Url;

?>
  <article class="content content-block container">
    <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>

    <div class="row ">
      <div class="blog col-md-9 col-md-offset-1 col-sm-12">
        <?= $page['content'] ?>


        <? foreach ($posts as $post) { ?>

          <div class="blogtng_list">
            <div class="post_title">
              <a href="<?=Url::to([$page['url'].'/'.$post['post_url']])?>"><?=$post['post_title']?></a>
            </div>
            <div class="post_img">
              <img src="<?=Yii::$app->request->hostInfo.'/media/blog/'.$post['post_img']?>" class="medialeft img-responsive" alt="">
            </div>

            <div class="post_text">
              <?=$post['post_preview_text']?>
            </div>
            <div class="post_footer">
              <a href="<?=Url::to([$page['url'].'/'.$post['post_url']])?>" class="wikilink1 blogtng_permalink">Read more</a>
              ·
              <?=date("Y/m/d H:i:s", strtotime($post['post_datetime']));?>    ·
              author    ·
              <a href="<?=Url::to([$page['url'].'/'.$post['post_url']])?>#the__comments" class="wikilink1 blogtng_commentlink">0 Comments</a>
              ·
              Tags:
            </div>
          </div>

        <? } ?>



      </div>

  </article>

<?= Footer::widget(); ?>