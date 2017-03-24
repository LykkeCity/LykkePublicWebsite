<?
use backend\components\helpers\UrlHelper;

$this->title = 'Edit page';
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['/page/']];
$this->params['breadcrumbs'][] = $this->title;
?>

<? if ($result == "error") { ?>
  <div class="alert alert-danger">
    Error saving =(
  </div>
<? } else {
  if ($result == 'success') { ?>
    <div class="alert alert-success text-center">
      <p><b>The changes are saved!</b></p>
    </div>
  <? }
} ?>

<form action="" method="post">
  <input type="hidden" name="id" value="<?= $page['id'] ?>">

  <!-- Control buttons -->
  <div class="row margin-b">

    <div class="col-sm-12 text-right">
      <button type="submit" class="btn btn-xs btn-success">
        Save
      </button>
      <a href="<?= UrlHelper::to(['/page/add']) ?>"
         class="btn btn-xs btn-primary">
        Create new page
      </a>
      <a href="<?= UrlHelper::to(['/page']) ?>"
         class="btn btn-xs btn-warning">
        Cancel
      </a>
    </div>

  </div>

  <!-- Title, Url, Content -->
  <div class="row">

    <div class="col-md-12">

      <div class="bs-panel">

        <div class="bs-title">Main</div>

        <div class="form-group">
          <label for="input-name">Title page</label>
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

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="editor_view">
                  <div style="display: block; width: 100%"
                            id="editor"
                            class="editor_basic"><?= $page['content'] ?></div>
                  <textarea style="display: none;" class="hidden-content-input" type="hidden" name="content">
                  <?= $page['content']; ?>
                  </textarea>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Settings -->
  <div class="row">

    <!-- Settings -->
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
          <textarea name="description" class="form-control input-sm"
                    id="input-description">
            <?= $page['description'] ?>
          </textarea>
        </div>
      </div>
    </div>

    <!-- Settings(Published, in menu, normal template, parent page, date
         controller, action, template) -->
    <div class="col-md-12">
      <div class="bs-panel">
        <div class="bs-title">Settings</div>
        <div class="checkbox">
          <label>
            <input name="published"
                   type="checkbox" <?= $page['published'] == 1
              ? 'checked="checked"' : ''; ?>
                   value="1"> Published
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input name="in_menu"
                   type="checkbox" <?= $page['in_menu'] == 1
              ? 'checked="checked"' : ''; ?>
                   value="1"> In menu
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input name="normal_tpl" type="checkbox" <?= $page['normal_tpl']
            == 1 ? 'checked="checked"' : ''; ?> value="1"> Normal template
          </label>
        </div>
        <div class="form-group">
          <label for="input-date">Parent page</label>
          <select name="parent" class="form-control">

            <option value="">No parent</option>

            <? foreach ($parents as $parent) { ?>
              <option <?= $page['parent'] == $parent->id ? 'selected' : ''; ?>
                value="<?= $parent->id ?>"><?= $parent->name ?></option>
            <? } ?>

          </select>
        </div>
        <div class="form-group">
          <label for="input-date">Date</label>
          <input name="datetime" type="datetime"
                 class="form-control input-sm datetimepicker"
                 value="<?= date(
                   "Y/m/d H:i:s", strtotime($page['datetime'])
                 ); ?>"
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
          <label for="input-template">Template</label>
          <input name="template" type="text" class="form-control input-sm"
                 id="input-template"
                 value="<?= $page['template'] ?>">
        </div>
      </div>
    </div>

  </div>

  <div class="margin-b">
    <button type="submit" class="btn btn-block btn-success">Save</button>
  </div>

</form>
