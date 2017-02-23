<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\components\helpers\UrlHelper;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
  <?php
  NavBar::begin([
    'brandLabel' => '<img src="/img/lykke_white.svg"> Back Office',
    'brandUrl'   => Yii::$app->homeUrl,
    'options'    => [
      'class' => 'navbar-inverse navbar-fixed-top',
    ],
  ]);

  if (!Yii::$app->user->isGuest) {

    $menuItems = [];
    $menuItems[] = '<li>'
      . Html::beginForm(['/site/logout'], 'post')
      . Html::submitButton(
        'Logout',
        ['class' => 'btn btn-link logout']
      )
      . Html::endForm()
      . '</li>';

    echo Nav::widget([
      'options' => ['class' => 'navbar-nav navbar-right'],
      'items'   => $menuItems,
    ]);
  }

  NavBar::end();
  ?>

  <div class="container">
    <?= Breadcrumbs::widget([
      'links'    => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      'homeLink' => [
        'label' => 'Main',
        'url'   => UrlHelper::to(['/'])
      ]
    ]) ?>
    <?= Alert::widget() ?>
    <? if (!Yii::$app->user->isGuest) { ?>
      <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
          <li role="presentation" class="<?= UrlHelper::isActive('index'); ?>">
            <a href="<?= UrlHelper::to(['/']) ?>">Main</a></li>
          <li role="presentation" class="<?= UrlHelper::isActive('page'); ?>">
            <a href="<?= UrlHelper::to(['/page']) ?>">Pages</a></li>
          <li role="presentation"
              class="<?= UrlHelper::isActive('blog/index'); ?>"><a
              href="<?= UrlHelper::to(['/blog/']) ?>">Blog</a></li>
          <li role="presentation"
              class="<?= UrlHelper::isActive('news/index'); ?>"><a
              href="<?= UrlHelper::to(['/news/']) ?>">News</a></li>
          <li role="presentation"
              class="<?= UrlHelper::isActive('asset/index'); ?> <?= UrlHelper::isActive('asset/pair'); ?>"><a
              href="<?= UrlHelper::to(['/asset']) ?>">Assets</a></li>
          <li role="presentation"
              class="<?= UrlHelper::isActive('user/index'); ?>"><a
              href="<?= UrlHelper::to(['/user']) ?>">Users</a></li>
          <li role="presentation"
              class="<?= UrlHelper::isActive('comments/index'); ?>"><a
              href="<?= UrlHelper::to(['/comments']) ?>">Comments</a></li>
          <li role="presentation"
              class="<?= UrlHelper::isActive('redirects/index'); ?>"><a
              href="<?= UrlHelper::to(['/redirects']) ?>">Redirects</a></li>
        </ul>
      </div>
      <div class="col-md-9">
        <?= $content ?>
      </div>
    <? }
    else { ?>
      <div class="col-md-12">
        <?= $content ?>
      </div>
    <? } ?>

  </div>
</div>

<footer class="footer">
  <div class="container">
    <p class="pull-left">&copy; Lykke <?= date('Y') ?></p>
  </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
