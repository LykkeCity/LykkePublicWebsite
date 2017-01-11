<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;
use yii\helpers\Url;

?>


  <article class="content">
    <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent'], 'backUrl' => Url::to([$page['url']])]) ?>

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

                <?php if(Yii::$app->user->isGuest) {?>
                  <div class="alert alert--message" role="alert">
                    <table>
                      <tr>
                        <td>
                          <div class="alert__text">Please <a href="<?=Url::to(['site/signin'])?>">login</a> to enter your comment</div>
                        </td>
                      </tr>
                    </table>
                  </div>
                <?php }else{?>
                  <form action="" class="form form--message" id="form-comment">
                    <input type="hidden" name="blog_post_id" value=" <?= $post['id'] ?>">
                    <input type="hidden" name="author" value=" <?= $post['post_author'] ?>">
                    <div class="message_card message_card--form">
                      <div class="user_badge user_badge--small">
                        <div class="user_badge__img"><img src="/img/avatar.svg" alt=""></div>
                        <div class="user_badge__message">
                          <div class="message_card__inner">
                            <div class="user_badge__title"><?=Yii::$app->user->identity->first_name?> <?=Yii::$app->user->identity->last_name?></div>
                            <textarea id="msg" name="comment" placeholder="Enter your comment here..." class="form-control form-control--textarea message_card__area"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="message_actions">
                      <div class="row">
                        <div class="col-sm-7">
                          <div class="checkbox">
                            <div class="switcher">
                              <input id="ch13" type="checkbox" class="switcher__elem">
                              <label for="ch13" class="switcher__control"></label>
                            </div>
                            <label for="ch13" class="control-label">Notify me of new comments via email</label>
                          </div>
                        </div>
                        <div class="col-sm-5 text-right">
                          <button  type="button" class="btn post-comment">Post comment</button>
                        </div>
                      </div>
                    </div>
                  </form>
                <?php }?>

                <div class="messages_list">
                  <?php
                      echo $this->render('partialComments', ['comments' => $comments, 'idAuthor' => $post['post_author']]);
                  ?>
                </div>

                <div class="show_more">
                  <button type="button" class="btn btn-md show-more" data-id="<?= $post['id'] ?>">Show more</button>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

    </section>
  </article>


<?= Footer::widget(); ?>



