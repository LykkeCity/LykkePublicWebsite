<?

use backend\components\helpers\UrlHelper;
use yii\widgets\LinkPager;

$this->title = 'Блог';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
  <div class="col-sm-12">
    <a href="<?= UrlHelper::to(['/blog/add']) ?>"
       class="btn btn-primary btn-xs pull-right">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      Добавить пост
    </a>
  </div>
</div>

<table class="table table-hover">
  <thead>
  <tr>
    <th>Id</th>
    <th>Имя</th>
    <th>Управление</th>
  </tr>
  </thead>
  <tbody>
  <? foreach ($posts as $post) { ?>
    <tr>
      <td><?= $post['id'] ?></td>
      <td><?= $post['post_title'] ?></td>
      <td>
        <a href="<?= UrlHelper::to(['/blog/edit', 'id' => $post['id']]) ?>"
           class="btn btn-primary btn-xs" data-toggle="tooltip"
           data-placement="top" title="Редактровать">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        <a href="<?= UrlHelper::to(['/blog/deleted', 'id' => $post['id']]) ?>"
           class="btn btn-danger btn-xs action-delete"
           data-toggle="tooltip" data-placement="top" title="Удалить">
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
