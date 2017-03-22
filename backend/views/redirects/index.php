<?
use backend\components\helpers\UrlHelper;

$this->title = 'Redirects';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
  <div class="col-sm-12">
    <p><b>Add redirect</b></p>
    <form action="" method="post">
      <div class="row">
        <div class="col-sm-5">
          <div class="form-group">
            <input type="text" name="redirect_with"
                   class="form-control input-sm" required
                   placeholder="redirect from">
          </div>

        </div>
        <div class="col-sm-5">
          <div class="form-group">
            <input type="text" name="redirect_to" class="form-control input-sm"
                   required placeholder="redirect to">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <button type="submit"
                    class="btn btn-primary btn-sm btn-block pull-right">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Add
            </button>
          </div>
        </div>
      </div>
    </form>
    <div>
      <table class="table table-hover dataTable">
        <thead>
          <tr>
            <th>With</th>
            <th>To</th>
            <th style="width: 20px;">Delete?</th>
          </tr>
        </thead>
        <tbody>
        <? foreach ($redirects as $item) { ?>
          <tr>
            <td><?= $item['redirect_with'] ?></td>
            <td><?= $item['redirect_to'] ?></td>
            <td style="text-align: center;">
              <a href="<?= UrlHelper::to(
                ['/redirects/delete', 'id' => $item['id']]
              ) ?>"
                 class="btn btn-danger btn-xs action-delete"
                 data-toggle="tooltip" data-placement="top" title="Delete">
                <span class="glyphicon glyphicon-trash"
                      aria-hidden="true"></span>
              </a>
            </td>
          </tr>
        <? } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
