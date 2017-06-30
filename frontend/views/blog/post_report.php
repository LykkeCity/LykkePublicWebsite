<?
use common\enum\CommentsType;
use common\enum\KycStatus;
use frontend\widgets\Footer;
use frontend\widgets\SocialShareInnerPost;
use \frontend\widgets\SubMenu;
use yii\helpers\Url;

?>

<?=SubMenu::widget()?>

<script>
    fbq('track', 'ViewContent', {});
</script>

<article class="content page">
  <section class="section">
    <div class="news_article news_article--report">

      <div class="news_article__header">
        <div class="container">
          <div class="r_header">
            <h1 class="r_header__title"><?=$post['post_title']?></h1>
            <div class="r_header__desc">2016</div>
          </div>
        </div>
      </div>

      <div class="news_article__body">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <div class="news_article__info">

                <img src="/img/report/report_olsen.jpg" class="img-responsive" alt="Richard">
                <h4>Richard Olsen,<br class="visible-xs"> Founder & CEO</h4>
              </div>
            </div>

            <div class="col-xs-12 col-sm-8 col-md-6">
              <div class="news_article__text text">
                  <?=$post['post_text']?>

              </div>
            </div>

            <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-4 col-sm-offset-2">
              <div class="block_header">
                <?php if (!Yii::$app->user->isGuest) { ?>
                  <button data-id="<?=$post['id']?>"
                        data-type="<?=CommentsType::BLOG?>"
                        type="button"
                        class="btn btn-sm pull-right action-<?=$subscribe
                        == 1 ? 'unsubscribe'
                            : 'subscribe';?>"><i
                      class="icon icon--mail"></i>
                  <span><?=$subscribe == 1 ? 'Unsubscribe'
                          : 'Subscribe';?></span></button>
                <? } ?>
                <h3>Comments <span><?=$countComments?></span></h3>
              </div>

              <!--Если не залогинены, то показывать этот баннер вместо блока .form--message-->
              <?php if (Yii::$app->user->isGuest) { ?>
                <div class="alert alert--message" role="alert">
                  <table>
                    <tr>
                      <td>
                        <div class="alert__text">Please <a href="<?=Url::to(['site/signin'])?>">login</a> to enter your comment</div>
                      </td>
                    </tr>
                  </table>
                </div>
              <? } ?>
              <?php if (!Yii::$app->user->isGuest) { ?>

                <?php if
                ((Yii::$app->user->identity->blocked_comment == 0)
                    && (Yii::$app->user->identity->kyc_status == KycStatus::OK)
                ) { ?>
                  <form action="" class="form form--message"
                        id="form-comment">
                    <input type="hidden" name="page_post_id"
                           value=" <?=$post['id']?>">
                    <input type="hidden" name="author"
                           value=" <?=$post['post_author']?>">
                    <input type="hidden" name="type"
                           value="<?=$type?>">
                    <div
                        class="message_card message_card--form">
                      <div
                          class="user_badge user_badge--small">
                        <div class="user_badge__img">
                          <img src="/img/avatar.svg"
                               alt=""></div>
                        <div
                            class="user_badge__message">
                          <div
                              class="message_card__inner">
                            <div
                                class="user_badge__title"><?=Yii::$app->user->identity->first_name?> <?=Yii::$app->user->identity->last_name?></div>
                            <textarea id="msg"
                                      name="comment"
                                      placeholder="Enter your comment here..."
                                      class="form-control form-control--textarea message_card__area"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="message_actions">
                      <div class="row">
                        <div
                            class="col-xs-8 text-right pull-right">
                          <div class="text--gray">
                            Please remember to be
                            respectful and
                            considerate. Thanks!
                          </div>
                        </div>
                        <div class="col-xs-4">
                          <button type="button"
                                  class="btn post-comment">
                            Post comment
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                <?php } ?>
              <?php } ?>

              <div class="messages_list">
                  <?php
                  echo $this->render('/comments/partial_comments',
                      [
                          'comments' => $comments,
                          'idAuthor' => $post['post_author'],
                          'idPage' => $post['id'],
                          'type' => $type,
                      ]);
                  ?>
              </div>
                <? if (!empty($comments)) { ?>
                  <div class="show_more">
                    <button type="button"
                            class="btn btn-md show-more"
                            data-id="<?=$post['id']?>">Show more
                    </button>
                  </div>
                <? } ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</article>
