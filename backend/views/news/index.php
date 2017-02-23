<?

use backend\components\helpers\UrlHelper;
use yii\widgets\LinkPager;

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
  <div class="col-sm-12">
    <a href="<?= UrlHelper::to(['/news/add']) ?>"
       class="btn btn-primary btn-xs pull-right">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      Add news
    </a>
  </div>
</div>

<table class="table table-hover">
  <thead>
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th></th>
  </tr>
  </thead>
  <tbody>
  <? foreach ($posts as $post) { ?>
    <tr>
      <td><?= $post['id'] ?></td>
      <td><?= $post['post_title'] ?></td>
      <td>
        <a href="<?= UrlHelper::to(['/news/edit', 'id' => $post['id']]) ?>"
           class="btn btn-primary btn-xs" data-toggle="tooltip"
           data-placement="top" title="Edit">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        <a href="<?= UrlHelper::to(['/news/deleted', 'id' => $post['id']]) ?>"
           class="btn btn-danger btn-xs action-delete"
           data-toggle="tooltip" data-placement="top" title="Delete">
          <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </a>
      </td>
    </tr>
  <? } ?>
  </tbody>
</table>
<?php
echo LinkPager::widget([
  'pagination' => $pages,
]);
?>
