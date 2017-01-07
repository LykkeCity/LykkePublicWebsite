<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;
use yii\helpers\Url;

?>


  <article class="content">
    <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>

    <section class="section">
      <div class="news_article">

        <div class="news_article__header">
          <div class="container">
            <div class="news_article__media news_article__media--main">
              <a href="<?=Url::to([$page['url'].'/'.$post['post_url']])?>">
                <img src="<?=Yii::$app->request->hostInfo.'/media/blog/'.$post['post_img']?>" alt="">
              </a>
            </div>
          </div>
        </div>

        <div class="news_article__body">
          <div class="container">
            <h1 class="news_article__title"><?=$post['post_title']?></h1>

            <div class="row">
              <div class="col-sm-3">
                <div class="news_article__info">
                  <div class="action_text">
                    Published in <a href="<?=Url::to([$page['url']])?>" class="text--dark_gray"><?=$page['name']?></a> 
                    <time><?=date("F, d", strtotime($post['post_datetime']));?></time>
                  </div>
                </div>
              </div>
              <div class="col-sm-9 col-md-8">
                <div class="news_article__text text">
                  <?= $post['post_text'] ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>
  </article>


<?= Footer::widget(); ?>



