<?

use backend\components\helpers\UrlHelper;

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
  <div class="col-sm-12">
    <a href="<?= UrlHelper::to(['/user/add']) ?>"
       class="btn btn-primary btn-xs pull-right">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      Добавить пользователя
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
  <? foreach ($users as $user) { ?>
    <tr>
      <td><?= $user['id'] ?></td>
      <td><?= $user['firstname'] ?> <?= $user['lastname'] ?></td>
      <td>
        <a href="<?= UrlHelper::to(['/user/edit', 'id' => $user['id']]) ?>"
               class="btn btn-primary btn-xs" data-toggle="tooltip"
               data-placement="top" title="Редактровать">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        <a href="<?= UrlHelper::to(['/user/deleted', 'id' => $user['id']]) ?>"
           class="btn btn-danger btn-xs action-delete"
           data-toggle="tooltip" data-placement="top" title="Удалить">
          <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </a>
      </td>
    </tr>
  <? } ?>
  </tbody>
</table>

