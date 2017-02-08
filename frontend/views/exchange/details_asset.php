<?
use frontend\widgets\AssetPairs;
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;
use yii\helpers\Url;

?>

<article class="content">
  <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>

  <section class="exchange section--padding">
    <div class="container">

      <a class="back_link" href="/<?=Url::to($page['url'])?>">
        <img src="/img/arrow-left.jpg" alt="" width="8">
        Back to Market Data
      </a>

      <div class="row">

        <div class="col-sm-2 col-md-3 text-center hidden-xs">
          <img src="/media/assets/default.jpg" width="130" alt="">
        </div>

        <div class="col-sm-10 col-md-8">

            <img src="/media/assets/default.jpg" width="98" alt="" class="visible-xs-inline-block">
            <?=$assetInfo['content']?>

            <hr>

            <ul class="list-inline">
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="<?=$assetInfo['coinprism_metadata']?>">Coinprism metadata</a></li>
              <li><a href="<?=$assetInfo['asset_definition']?>">Asset definition</a></li>
              <li><a href="<?=$assetInfo['coin_holders']?>">Coin holders</a></li>
            </ul>


        </div>

      </div>
    </div>
  </section>

</article>


<?= Footer::widget(); ?>
