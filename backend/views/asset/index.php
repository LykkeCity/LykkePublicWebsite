<?
use backend\components\helpers\UrlHelper;

$this->title = 'Активы';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="row">
  <div class="col-sm-12">
    <p><b>Добавить актив для отображения на странице exchange</b></p>
    <form action="" method="post">
      <div class="row">
        <div class="col-sm-10">
          <div class="form-group">
            <input type="text" name="name" class="form-control input-sm" placeholder="Название актива">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm btn-block pull-right">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Добавить
            </button>
          </div>
        </div>
      </div>
    </form>
    <div>
      <table class="table table-hover">
        <tr>
          <th>Имя</th>
          <th>Управление</th>
        </tr>
        <? foreach ($asset as $item) { ?>
            <tr>
              <td><?=$item['name']?></td>
              <td>
                <a href="<?= UrlHelper::to(['/asset/deleted', 'id' => $item['id']]) ?>"
                   class="btn btn-danger btn-xs action-delete"
                   data-toggle="tooltip" data-placement="top" title="Удалить">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
              </td>
            </tr>
        <? } ?>
      </table>
    </div>
  </div>
</div>
