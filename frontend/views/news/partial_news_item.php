<?
use yii\helpers\Url;
?>
<? foreach ($posts as $post) { ?>
    <div class="news_list__item">
      <div class="news_list__media">
        <a href="<?=Url::to([$page['url'].'/'.$post['post_url']])?>">
          <img src="<?=Yii::$app->request->hostInfo.'/media/news/'.$post['post_img']?>" alt="news_image_alt">
        </a>
      </div>
      <div class="news_list__info">
        <a href="" class="action_link"><?= $page['name'] ?></a> &middot; <span class="news_list__date"><?=date("F, d", strtotime($post['post_datetime']));?></span>
      </div>
      <div class="news_list__title h3">
        <a href="<?=Url::to([$page['url'].'/'.$post['post_url']])?>"><?=$post['post_title']?></a>
      </div>
      <p class="news_list__text"><?=$post['post_preview_text']?></p>
    </div>
<? } ?>