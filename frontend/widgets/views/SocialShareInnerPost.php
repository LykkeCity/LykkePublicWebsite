<?
use yii\helpers\Url;
?>
<div  class="social_share">
  <div class="social_share__text">Liked this article? Share it!</div>
  <ul class="social social--simple">
    <li><a href="https://www.facebook.com/sharer.php?u=<?=Yii::$app->urlManager->hostInfo.Url::to([$page_url.'/'.$post_url])?>&picture=<?=$picture?>" target="_blank" class="social__item"><i class="icon icon--fb_simple"></i></a></li>
    <li><a href="http://twitter.com/share?text=<?=$post_title?>&url=<?=Yii::$app->urlManager->hostInfo.Url::to([$page_url.'/'.$post_url])?>" target="_blank" class="social__item"><i class="icon icon--tw"></i></a></li>
  </ul>
</div>