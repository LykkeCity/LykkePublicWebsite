<?
use backend\components\helpers\UrlHelper;
use common\enum\CommentsType;
use yii\widgets\LinkPager;

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;

?>

<table class="table table-hover">
  <tr>
    <th>Name</th>
    <th>Comment</th>
    <th>Deleted?</th>
    <th>Spam?</th>
    <th>Edited?</th>
    <th>Date</th>
    <th>Edit history</th>
    <th>On page</th>
    <th></th>
  </tr>
  <? foreach ($comments as $comment) { ?>
    <tr>
      <td><?= $comment['last_name'] ?> <?= $comment['first_name'] ?></td>
      <td><em><?= $comment['comment'] ?></em></td>
      <td><?= $comment['deleted'] > 0 ? "Yes" : "No" ?></td>
      <td><?= $comment['spam'] > 0 ? "<span style='color: red'>Yes - " . $comment['spam'] . " times</span>" : "No" ?></td>
      <td><?= $comment['edited'] > 0 ? "Yes" : "No" ?></td>
      <td><?= $comment['date'] ?></td>
      <td>
        <? if ($comment['edited'] > 0) { ?>
        <a class="view_history" data-comment-id="<?= $comment['id'] ?>"
           data-page-post-id="<?= $comment['page_post_id'] ?>"
           data-type="<?= $type ?>" href="">View</a></td>
      <? } ?>
      <td>
        <a
          href="<?= UrlHelper::to('/' . Yii::$app->params['uri_' . $type] . '/' . $comment['post_url']) ?>"
          target="_blank" data-toggle="tooltip" data-placement="top"
          title="<?= $comment['post_title'] ?>">Open</a></td>
      </td>
      <td><a href="<?= UrlHelper::to([
          '/comments/deleted',
          'id' => $comment['id'],
          'type' => $type,
        ]) ?>"
             class="btn btn-danger btn-xs action-delete"
             data-toggle="tooltip" data-placement="top" title="delete forever">
          <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </a></td>
    </tr>
  <? } ?>
</table>


<?
if ($pages) {
  echo LinkPager::widget([
    'pagination' => $pages,
  ]);
}

?>


<!-- Modal -->
<div class="modal fade" id="history" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"
                aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">History edit commentary</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>
