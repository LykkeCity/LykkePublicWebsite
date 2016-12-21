<?
use backend\components\helpers\UrlHelper;

$this->title = 'Активы';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="row">
  <div class="col-sm-12">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="<?= UrlHelper::isActive('asset/index'); ?>"><a href="<?= UrlHelper::to(['/asset']) ?>">Активы</a></li>
      <li role="presentation" class="<?= UrlHelper::isActive('asset/pair'); ?>"><a href="<?= UrlHelper::to(['/asset/pair']) ?>">Пары</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane <?= UrlHelper::isActive('asset/index'); ?>">
        <div class="tab-content" style="padding: 15px 0px;">

          <div class="row">
            <div class="col-sm-12">
              <a href="<?= UrlHelper::to(['/asset/add']) ?>"
                 class="btn btn-primary btn-xs pull-right">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Добавить актив
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
            <? foreach ($assets as $asset) { ?>
              <tr>
                <td><?= $asset['id'] ?></td>
                <td><?= $asset['name'] ?></td>
                <td>
                  <a href="<?= UrlHelper::to(['/asset/edit', 'id' => $asset['id']]) ?>"
                     class="btn btn-primary btn-xs" data-toggle="tooltip"
                     data-placement="top" title="Редактровать">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                  </a>
                  <a href="<?= UrlHelper::to(['/asset/deleted', 'id' => $asset['id']]) ?>"
                     class="btn btn-danger btn-xs action-delete"
                     data-toggle="tooltip" data-placement="top" title="Удалить">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                  </a>
                </td>
              </tr>
            <? } ?>
            </tbody>
          </table>


        </div>
      </div>
      <div role="tabpanel" class="tab-pane <?= UrlHelper::isActive('asset/pair'); ?>" >
        <div class="tab-content" style="padding: 15px 0px;">

          <? if ($result == "error") { ?>
            <div class="alert alert-danger">
              Ошибка добавления =(
            </div>
          <? }
          else {
            if ($result == 'success') { ?>
              <div class="alert alert-success text-center">
                <p><b>Пара успешно добавлена!</b></p>
              </div>
            <? }
          } ?>

          <form action="" method="post">
            <div class="row">
              <div class="col-sm-5">
                    <div class="form-group">
                      <select name="asset_basic_id" class="form-control input-sm" required>
                        <option value="">Выберите базовый актив</option>
                        <? foreach ($assets as $asset) { ?>
                          <option value="<?= $asset['id'] ?>"><?= $asset['name'] ?></option>
                        <? } ?>

                      </select>
                    </div>
              </div>
              <div class="col-sm-5">
                <div class="form-group">
                  <select name="asset_quote_id" class="form-control input-sm" required>
                    <option value="">Выберите котируемый актив</option>
                    <? foreach ($assets as $asset) { ?>
                      <option value="<?= $asset['id'] ?>"><?= $asset['name'] ?></option>
                    <? } ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-xs pull-right">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    Добавить пару
                  </button>
                </div>
              </div>
            </div>
          </form>

          <table class="table table-hover">
            <thead>
            <tr>
              <th>Id</th>
              <th>Имя</th>
              <th>Управление</th>
            </tr>
            </thead>
            <tbody>
            <?
              if (!empty($assetPairs)) {
                  foreach ($assetPairs as $pair) {
               ?>
              <tr>
                <td><?= $pair['id'] ?></td>
                <td><?= $pair['asset_basic'] ?>/<?= $pair['asset_quote'] ?></td>
                <td>
                  <a href="<?= UrlHelper::to(['/asset/deleted-asset-pair', 'id' => $pair['id']]) ?>"
                     class="btn btn-danger btn-xs action-delete"
                     data-toggle="tooltip" data-placement="top" title="Удалить">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                  </a>
                </td>
              </tr>
            <?  } ?>
            <? } ?>
            </tbody>
          </table>


        </div>


      </div>
    </div>

  </div>
</div>
