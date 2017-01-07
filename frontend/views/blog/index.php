<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;
use yii\web\View;

Yii::$app->view->registerJsFile('/js/blog.js',  ['position' => View::POS_END, 'depends' => 'frontend\assets\MainAsset']);

?>



  <article class="content">
    <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>

    <section class="section section--lead section--padding">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 automargin">
            <h1> <?= $page['name'] ?></h1>
            <div class="news_list">
              <?=$this->render('partialBlogItem', ['page' => $page, 'posts' => $posts]);?>
            </div>
            <div class="spinner_container" style="display: none;">
              <div class="spinner">
                <div class="spinner__inside"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </article>

<?= Footer::widget(); ?>


