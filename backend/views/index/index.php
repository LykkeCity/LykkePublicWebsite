<?
use backend\components\helpers\UrlHelper;

$this->title = 'Главная';

?>
<div class="margin-b">
  <img src="/img/lykke_new.svg">
</div>
<div class="row main-link">
  <div class="col-md-3 margin-b">
    <a href="<?= UrlHelper::to(['pages/add']) ?>"
       class="btn btn-block btn-default">Добавить страницу</a>
  </div>
  <div class="col-md-3 margin-b">
    <a  href="<?= UrlHelper::to(['blog/add']) ?>"  class="btn btn-block btn-default">Добавить пост</a>
  </div>
  <div class="col-md-3 margin-b">
    <a href="<?= UrlHelper::to(['user/add']) ?>" class="btn btn-block btn-default">Добавить пользователя</a>
  </div>
  <div class="col-md-3 margin-b">
    <a href="/" type="button"
       class="btn btn-block btn-default">Перейти на сайт</a>
  </div>
</div>

