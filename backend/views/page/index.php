<?
use backend\components\helpers\UrlHelper;

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
  <div class="col-sm-12">
    <a href="<?= UrlHelper::to(['/page/add']) ?>"
       class="btn btn-primary btn-xs pull-right">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      Add page
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
  <? foreach ($pages as $page) { ?>
    <tr>
      <td><?= $page['id'] ?></td>
      <td><?= $page['name'] ?></td>
      <td>
        <a href="<?= UrlHelper::to(['/page/edit', 'id' => $page['id']]) ?>"
           class="btn btn-primary btn-xs" data-toggle="tooltip"
           data-placement="top" title="Edit">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        <a href="<?= UrlHelper::to(['/page/deleted', 'id' => $page['id']]) ?>"
           class="btn btn-danger btn-xs action-delete"
           data-toggle="tooltip" data-placement="top" title="Delete">
          <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </a>
      </td>
    </tr>

    <? if (!empty($page['sub_pages'])) { ?>
      <? foreach ($page['sub_pages'] as $sub_page) { ?>
        <tr class="sub_page">
          <td>--<?= $sub_page['id'] ?></td>
          <td><?= $sub_page['name'] ?></td>
          <td>
            <a href="<?= UrlHelper::to([
              '/page/edit',
              'id' => $sub_page['id']
            ]) ?>"
               class="btn btn-primary btn-xs" data-toggle="tooltip"
               data-placement="top" title="Edit">
              <span class="glyphicon glyphicon-pencil"
                    aria-hidden="true"></span>
            </a>
            <a href="<?= UrlHelper::to([
              '/page/deleted',
              'id' => $sub_page['id']
            ]) ?>" class="btn btn-danger btn-xs action-delete"
               data-toggle="tooltip" data-placement="top" title="Delete">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </a>
          </td>
        </tr>
      <? } ?>
    <? } ?>

  <? } ?>
  </tbody>
</table>