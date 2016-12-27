<?
use backend\components\helpers\UrlHelper;

$this->title = 'Добавить страницу';
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['/page/']];
$this->params['breadcrumbs'][] = $this->title;
?>

<? if ($result == "error") { ?>
  <div class="alert alert-danger">
    Ошибка создания страницы =(
  </div>
<? }
else {
  if ($result == 'success') { ?>
    <div class="alert alert-success text-center">
      <p><b>Страница успешно создана!</b></p>
      <br>
      <a href="<?= UrlHelper::to(['page/edit', 'id' => $id]) ?>"
         class="btn btn-xs btn-success">
        Редактировать
      </a>
      <a href="<?= UrlHelper::to(['page/add']) ?>"
         class="btn btn-xs btn-primary">
        Создать новую страницу
      </a>
    </div>
  <? }
} ?>

<form action="" method="post">
  <div class="row margin-b">
    <div class="col-sm-12 text-right">
      <button type="submit"
              class="btn btn-xs btn-success">
        Добавить
      </button>
      <a href="<?= UrlHelper::to(['/page']) ?>"
         class="btn btn-xs btn-warning">
        Отмена
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="bs-panel">
        <div class="bs-title">Основное</div>

        <div class="form-group">
          <label for="input-name">Название страницы</label>
          <input type="text" name="name" onkeyup="translit(this, '#input-url')"
                 class="form-control input-sm" id="input-name" required>
        </div>
        <div class="form-group">
          <label for="input-url">Url</label>
          <input type="text" name="url" class="form-control input-sm"
                 id="input-url" required>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <div>

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active change_editor"><a href="#editor_view"  role="tab" data-toggle="tab">Визуальный редактор</a></li>
                <li role="presentation" class="change_editor_html"><a href="#editor_view"  role="tab" data-toggle="tab">HTML редактор</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="editor_view">
                  <textarea style="width: 100%" name="content" id="editor" class="editor_full"></textarea>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="bs-panel">
        <div class="bs-title">SEO</div>
        <div class="form-group">
          <label for="input-title">Title</label>
          <input type="text" name="title" class="form-control input-sm"
                 id="input-title">
        </div>
        <div class="form-group">
          <label for="input-keywords">Keywords</label>
          <input type="text" name="keywords" class="form-control input-sm"
                 id="input-keywords">
        </div>
        <div class="form-group">
          <label for="input-description">Description</label>
          <input type="text" name="description" class="form-control input-sm"
                 id="input-description">
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="bs-panel">
        <div class="bs-title">Настройки</div>
        <div class="checkbox">
          <label>
            <input name="published" type="checkbox" checked="checked" value="1">
            Опубликован
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input name="in_menu" type="checkbox" value="1"> В меню
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input name="normal_tpl" type="checkbox" value="1"> Обычный шаблон
          </label>
        </div>
        <div class="form-group">
          <label for="input-date">Родительская страница</label>
          <select name="parent" class="form-control">
            <option value="">Без родителя</option>

            <? foreach ($parents as $parent) { ?>
              <option value="<?= $parent->id ?>"><?= $parent->name ?></option>
            <? } ?>

          </select>
        </div>
        <div class="form-group">
          <label for="input-date">Дата</label>
          <input name="datetime" type="text"
                 class="form-control input-sm datetimepicker" id="input-date">
        </div>
        <div class="form-group">
          <label for="input-controller">Controller</label>
          <input name="controller" type="text" class="form-control input-sm"
                 id="input-controller"
                 value="pages">
        </div>
        <div class="form-group">
          <label for="input-action">Action</label>
          <input name="action" type="text" class="form-control input-sm"
                 id="input-action"
                 value="index">
        </div>
        <div class="form-group">
          <label for="input-template">Шаблон</label>
          <input name="template" type="text" class="form-control input-sm"
                 id="input-template"
                 value="index">
        </div>
      </div>
    </div>
  </div>
  <div class="margin-b">
    <button type="submit" class="btn btn-block btn-success">Добавить</button>
  </div>
</form>
