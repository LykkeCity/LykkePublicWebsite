<?
use backend\components\helpers\UrlHelper;

$this->title = 'Add page';
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['/page/']];
$this->params['breadcrumbs'][] = $this->title;
?>

<? if ($result == "error") { ?>
  <div class="alert alert-danger">
    Error create page =(
  </div>
<? }
else {
  if ($result == 'success') { ?>
    <div class="alert alert-success text-center">
      <p><b>Page is successfully created!</b></p>
      <br>
      <a href="<?= UrlHelper::to(['page/edit', 'id' => $id]) ?>"
         class="btn btn-xs btn-success">
        Edit
      </a>
      <a href="<?= UrlHelper::to(['page/add']) ?>"
         class="btn btn-xs btn-primary">
        Create new page
      </a>
    </div>
  <? }
} ?>

<form action="" method="post">
  <div class="row margin-b">
    <div class="col-sm-12 text-right">
      <button type="submit"
              class="btn btn-xs btn-success">
        Add
      </button>
      <a href="<?= UrlHelper::to(['/page']) ?>"
         class="btn btn-xs btn-warning">
        Cancel
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="bs-panel">
        <div class="bs-title">Main</div>

        <div class="form-group">
          <label for="input-name">Title page</label>
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
                <li role="presentation" class="active change_editor"><a href="#editor_view"  role="tab" data-toggle="tab">Visual editor</a></li>
                <li role="presentation" class="change_editor_html"><a href="#editor_view"  role="tab" data-toggle="tab">HTML editor</a></li>
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
        <div class="bs-title">Settings</div>
        <div class="checkbox">
          <label>
            <input name="published" type="checkbox" checked="checked" value="1">
            Published
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input name="in_menu" type="checkbox" value="1"> In menu
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input name="normal_tpl" type="checkbox" value="1"> Normal template
          </label>
        </div>
        <div class="form-group">
          <label for="input-date">Parent page</label>
          <select name="parent" class="form-control">
            <option value="">No parent</option>

            <? foreach ($parents as $parent) { ?>
              <option value="<?= $parent->id ?>"><?= $parent->name ?></option>
            <? } ?>

          </select>
        </div>
        <div class="form-group">
          <label for="input-date">Date</label>
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
          <label for="input-template">Template</label>
          <input name="template" type="text" class="form-control input-sm"
                 id="input-template"
                 value="index">
        </div>
      </div>
    </div>
  </div>
  <div class="margin-b">
    <button type="submit" class="btn btn-block btn-success">Add</button>
  </div>
</form>
