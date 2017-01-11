<div class="message_card <?=$comment['lykke_user_id'] == $idAuthor ? 'message_card--accent' : ''?>">
  <div class="user_badge user_badge--small">
    <div class="user_badge__img"><a href=""><img src="/img/avatar.svg" alt=""></a></div>
    <div class="user_badge__message">
      <div class="message_card__inner">
        <div class="user_badge__title"><a href=""><?=$comment['first_name']?> <?=$comment['last_name']?></a>
          <?=$comment['lykke_user_id'] == $idAuthor ? '<span class="label label--primary">author</span>' : ''?>
          <span class="message_card__date">&middot; <?=date("g:i A F d, Y", strtotime($comment['date']));?></span>
        </div>
        <div class="message_card__message">
          <p>
            <?=$comment['comment']?>
          </p>

          <?php if (Yii::$app->userAccess->access('edit_frontent') == 1){ ?>
            <div class="card__actions">
              <a href="" class="action_link">Reply</a>
              &middot;
              <a href="" data-id="<?=$comment['id']?>" class="action_link action_link-delete">Delete</a>
              &middot;
              <a href="" class="action_link">Spam</a>
            </div>
          <?php } ?>



          <!--<textarea name="" id="" cols="30" rows="10" class="form-control message_card__reply form-control--textarea"></textarea>

          <div class="text-right">
            <button type="button" class="btn">Send</button>
          </div>
-->
        </div>
      </div>
    </div>
  </div>
</div>