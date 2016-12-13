<?
use backend\components\helpers\UrlHelper;

$this->title = 'Редактировать страницу';
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['/pages/']];
$this->params['breadcrumbs'][] = $this->title;
?>

<? if ($result == "error") { ?>
  <div class="alert alert-danger">
    Ошибка сохранения =(
  </div>
<? }
else {
  if ($result == 'success') { ?>
    <div class="alert alert-success text-center">
      <p><b>Изменения успешно сохранены!</b></p>
    </div>
  <? }
} ?>

<form action="" method="post">
  <input type="hidden" name="id" value="<?= $page['id'] ?>">
  <div class="row margin-b">
    <div class="col-sm-12 text-right">
      <button type="submit"
              class="btn btn-xs btn-success">
        Сохранить
      </button>
      <a href="<?= UrlHelper::to(['/pages/add']) ?>"
         class="btn btn-xs btn-primary">
        Создать новую
      </a>
      <a href="<?= UrlHelper::to(['/pages']) ?>"
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
          <input type="text" name="name" class="form-control input-sm"
                 id="input-name" required value="<?= $page['name'] ?>">
        </div>
        <div class="form-group">
          <label for="input-url">Url</label>
          <input type="text" name="url" class="form-control input-sm"
                 id="input-url" value="<?= $page['url'] ?>" required>
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
                   <textarea style="width: 100%" name="content" id="editor" class="editor_full"><?= $page['content'] ?></textarea>
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
                 value="<?= $page['title'] ?>" id="input-title">
        </div>
        <div class="form-group">
          <label for="input-keywords">Keywords</label>
          <input type="text" name="keywords" class="form-control input-sm"
                 value="<?= $page['keywords'] ?>" id="input-keywords">
        </div>
        <div class="form-group">
          <label for="input-description">Description</label>
          <input type="text" name="description" class="form-control input-sm"
                 value="<?= $page['description'] ?>" id="input-description">
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="bs-panel">
        <div class="bs-title">Настройки</div>
        <div class="checkbox">
          <label>
            <input name="published"
                   type="checkbox" <?= $page['published'] == 1 ? 'checked="checked"' : ''; ?>
                   value="1"> Опубликован
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input name="in_menu"
                   type="checkbox" <?= $page['in_menu'] == 1 ? 'checked="checked"' : ''; ?>
                   value="1"> В меню
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input name="normal_tpl" type="checkbox" <?= $page['normal_tpl'] == 1 ? 'checked="checked"' : '';?>  value="1"> Обычный шаблон
          </label>
        </div>
        <div class="form-group">
          <label for="input-date">Родительская страница</label>
          <select name="parent" class="form-control">
            <option value="">Без родителя</option>

            <? foreach ($parents as $parent) { ?>
              <option <?= $page['parent'] == $parent->id ? 'selected' : ''; ?>
                value="<?= $parent->id ?>"><?= $parent->name ?></option>
            <? } ?>

          </select>
        </div>
        <div class="form-group">
          <label for="input-date">Дата</label>
          <input name="datetime" type="datetime"
                 class="form-control input-sm datetimepicker"
                 value="<?= date("Y/m/d H:i:s", strtotime($page['datetime'])); ?>"
                 id="input-date">
        </div>
        <div class="form-group">
          <label for="input-controller">Controller</label>
          <input name="controller" type="text" class="form-control input-sm"
                 id="input-controller"
                 value="<?= $page['controller'] ?>">
        </div>
        <div class="form-group">
          <label for="input-action">Action</label>
          <input name="action" type="text" class="form-control input-sm"
                 id="input-action"
                 value="<?= $page['action'] ?>">
        </div>
        <div class="form-group">
          <label for="input-template">Шаблон</label>
          <input name="template" type="text" class="form-control input-sm"
                 id="input-template"
                 value="<?= $page['template'] ?>">
        </div>
      </div>
    </div>
  </div>
  <div class="margin-b">
    <button type="submit" class="btn btn-block btn-success">Сохранить</button>
  </div>
</form>
