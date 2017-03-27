<?
use common\enum\KycStatus;

?>
<div class="message_card
           <?=$comment['deleted'] == 1 ? 'message_card--deleted' : ''?>
           <?=$comment['lykke_user_id'] == $idAuthor ? 'message_card--accent' : ''?>">
    <div class="user_badge user_badge--small">
        <div class="user_badge__img"><a href=""><img src="/img/avatar.svg"
                                                     alt=""></a></div>
        <div class="user_badge__message">
            <div class="message_card__inner">
                <div class="user_badge__title"><a
                        href=""><?=$comment['first_name']?> <?=$comment['last_name']?></a>
                    <span class="middot">&middot;</span>

                    <?=$comment['lykke_user_id'] == $idAuthor
                        ? '<span class="label label--primary">author</span> <span class="middot">&middot;</span>'
                        : ''?>

                    <span class="message_card__date"><?=date("g:i A F d, Y",
                            strtotime($comment['date']));?></span>

                    <?=$comment['edited'] == 1
                        ? '<span class="middot">&middot;</span>   <div class="label label--dark label--text label-edited">edited <i class="icon icon--edit_alt"></i></div>'
                        : ''?>

                    <?=$comment['deleted'] == 1
                        ? '<span class="middot">&middot;</span>  <span class="label label--dark label--text">deleted</span>'
                        : ''?>

                    <?=$comment['spam'] > 0
                        ? '<span class="middot ">&middot;</span>   <div class="label label--text label--red label-spam">Suspicious comment</div>'
                        : ''?>


                </div>
                <div class="message_card__message">
                    <p class="comment-text"><?=$comment['comment']?></p>

                    <div class="card__actions">
                        <?php if (!Yii::$app->user->isGuest) { ?>
                            <?php if (!$isReplyComment
                                && Yii::$app->user->identity->kyc_status
                                == KycStatus::OK
                            ) { ?>
                                <a href=""
                                   class="action_link action_link-reply">Reply</a>
                            <?php } ?>


                            <?php if ($comment['lykke_user_id']
                                == Yii::$app->user->id
                                && strtotime(date('Y-m-d H:i:s'))
                                <= strtotime($comment['date'].'+1 day')
                                && $comment['deleted'] == 0
                            ) { ?>
                                &middot;
                                <a href="" data-id="<?=$comment['id']?>"
                                   class="action_link action_link-edit">Edit</a>
                            <?php } ?>

                            <?php if ((Yii::$app->userAccess->access('edit_frontent')
                                    == 1
                                    || $comment['lykke_user_id']
                                    == Yii::$app->user->id)
                                && $comment['deleted'] == 0
                            ) { ?>
                                &middot;
                                <a href="" data-id="<?=$comment['id']?>"
                                   class="action_link action_link-delete">Delete</a>
                            <?php } ?>

                            &middot;
                            <a href="" data-id="<?=$comment['id']?>"
                               class="action_link action_link-spam">Spam</a>


                            <?php if (Yii::$app->userAccess->access('edit_frontent')
                                == 1
                            ) { ?>
                                &middot;
                                <a href=""
                                   data-id="<?=$comment['lykke_user_id']?>"
                                   class="action_link action_link-block-user">Block
                                    user</a>
                            <?php } ?>
                        <? } else { ?>
                            <div class="action_link"></div>
                        <? } ?>

                        <? if (!empty($comment['reply_comment'])) { ?>
                            <span
                                class="action_text  pull-right"><?=count($comment['reply_comment'])?>
                                response</span>
                        <? } ?>

                    </div>


                    <div class="block-reply" style="display: none;">
                        <form class="reply-comment-form">
                            <input type="hidden" name="reply_comment_id"
                                   value="<?=$comment['id']?>">
                            <input type="hidden" name="page_post_id"
                                   value="<?=$idPage?>">
                            <input type="hidden" name="type" value="<?=$type?>">
                            <textarea name="comment" id="" cols="30" rows="10"
                                      class="form-control message_card__reply form-control--textarea"></textarea>
                            <div class="text-right">
                                <button type="button" class="btn send-reply">
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>

                    <?php if ($comment['lykke_user_id'] == Yii::$app->user->id
                        && strtotime(date('Y-m-d H:i:s'))
                        <= strtotime($comment['date'].'+1 day')
                        && $comment['deleted'] == 0
                    ) { ?>
                        <div class="block-edit" style="display: none;">
                            <form class="edit-comment-form">
                                <input type="hidden" name="comment_id"
                                       value="<?=$comment['id']?>">
                                <input type="hidden" name="page_post_id"
                                       value="<?=$idPage?>">
                                <input type="hidden" name="type"
                                       value="<?=$type?>">
                                <textarea name="comment" id="" cols="30"
                                          rows="10"
                                          class="form-control message_card__reply form-control--textarea edit-textarea"></textarea>
                                <div class="text-right">
                                    <button type="button" class="btn send-edit">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    <?php } ?>


                </div>
            </div>

            <?php
            if (!empty($comment['reply_comment'])) {
                foreach ($comment['reply_comment'] as $reply_comment) {
                    echo $this->render('partial_comment_item', [
                        'comment' => $reply_comment,
                        'idAuthor' => $idAuthor,
                        'idPage' => $idPage,
                        'isReplyComment' => true,
                        'type' => $type,
                    ]);
                }
            }
            ?>

        </div>
    </div>
</div>