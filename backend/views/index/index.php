<?
use backend\components\helpers\UrlHelper;

$this->title = 'Main';

?>
<div class="margin-b">
  <img src="/img/lykke_new.svg">
</div>
<div class="row main-link">
<!--  <div class="col-md-3 margin-b">-->
<!--    <a href="--><?//= UrlHelper::to(['page/add']) ?><!--"-->
<!--       class="btn btn-block btn-default">Add page</a>-->
<!--  </div>-->
  <div class="col-md-3 margin-b">
    <a  href="<?= UrlHelper::to(['blog/add']) ?>"  class="btn btn-block btn-default">Add post</a>
  </div>
  <div class="col-md-3 margin-b">
    <a  href="<?= UrlHelper::to(['news/add']) ?>"  class="btn btn-block btn-default">Add news</a>
  </div>
  <div class="col-md-3 margin-b">
    <a href="/" type="button"
       class="btn btn-block btn-default">Go to the website</a>
  </div>
</div>

