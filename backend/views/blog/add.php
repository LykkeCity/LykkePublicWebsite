<?
use backend\components\helpers\UrlHelper;

$this->title = 'Add post';
$this->params['breadcrumbs'][] = ['label' => 'Blog', 'url' => ['/blog/']];
$this->params['breadcrumbs'][] = $this->title;
?>


<? if ($result == "error") { ?>
  <div class="alert alert-danger">
    Error creating post =(
  </div>
<? }
else {
  if ($result == 'success') { ?>
    <div class="alert alert-success text-center">
      <p><b>Post added successfully!</b></p>
      <br>
      <a href="<?= UrlHelper::to(['blog/edit', 'id' => $id]) ?>"
         class="btn btn-xs btn-success">
        Edit
      </a>
      <a href="<?= UrlHelper::to(['blog/add']) ?>"
         class="btn btn-xs btn-primary">
        Create new post
      </a>
    </div>
  <? }
} ?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="row margin-b">
    <div class="col-sm-12 text-right">
      <button type="submit"
              class="btn btn-xs btn-success">
        Add
      </button>
      <a href="<?= UrlHelper::to(['/blog']) ?>"
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
          <label for="input-title">Title</label>
          <input type="text" name="post_title" onkeyup="translit(this, '#input-post_url')"
                 class="form-control input-sm" id="input-title" required>
        </div>
        <div class="form-group">
          <label for="input-post_url">Url</label>
          <input type="text" name="post_url" class="form-control input-sm"
                 id="input-post_url" required>
        </div>

        <div class="form-group">
          <label for="input-post-img">Image</label>
          <p><small>recommended size 1170х755</small></p>
          <input type="file" name="post_img" class="form-control input-sm"
                 id="input-post-img">
        </div>

        <div class="form-group">
          <label for="">Text preview</label>
          <textarea name="post_preview_text" id="editor" class="editor_basic"></textarea>
        </div>

        <div class="form-group">
          <label for="">Main text</label>
          <textarea name="post_text" id="editor" class="editor_full"></textarea>
        </div>

      </div>
    </div>
  </div>
<div class="row">
  <div class="col-md-12">
    <div class="bs-panel">
      <div class="bs-title">Settings</div>
      <div class="checkbox">
        <label>
          <input name="published" type="checkbox" checked="checked" value="1">
          Published
        </label>
      </div>
      <div class="form-group">
        <label for="input-post_date">Date</label>
        <input name="post_datetime" type="text"
               class="form-control input-sm datetimepicker" id="input-post_date">
      </div>
    </div>
  </div>
  </div>

  <div class="margin-b">
    <button type="submit" class="btn btn-block btn-success">Add post</button>
  </div>

  </div>
  
  </form>
