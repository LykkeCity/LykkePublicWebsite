<?
use backend\components\helpers\UrlHelper;

$this->title = 'Add post';
if (isset($result)) {
    if ($result == "error") {
        $err = true;
    } else {
        $succ = true;
    }
} else {
    $err = false;
    $succ = false;
}
?>

<div class="col-md-12">
  <div class="box">
    <div class="box-header">

    </div>
    <div class="box-body">
        <? if ($err) { ?>
          <div class="alert alert-danger">
            Error creating post =(
          </div>
        <? } ?>
        <? if ($succ) { ?>
          <div class="alert alert-success text-center">
            <p><b>Post added successfully!</b></p>
            <br>
            <a href="<?=UrlHelper::to(['blog/edit', 'id' => $id])?>"
               class="btn btn-xs btn-success">
              Edit
            </a>
            <a href="<?=UrlHelper::to(['blog/add'])?>"
               class="btn btn-xs btn-primary">
              Create new post
            </a>
          </div>
        <? } ?>

      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-12">
            <div class="bs-panel">
              <div class="bs-title">Main</div>

              <div class="form-group">
                <label for="input-title">Title</label>
                <input type="text" name="post_title"
                       onkeyup="translit(this, '#input-post_url')"
                       class="form-control input-sm" id="input-title" required>
              </div>
              <div class="form-group">
                <label for="input-post_url">Slug</label>
                <input type="text" name="post_url" class="form-control input-sm"
                       id="input-post_url" required>
              </div>

              <div class="form-group">
                <label for="">Text preview</label>
                <div data-name="post_preview_text" id="editor"
                     class="editor_basic"><?=$post['post_preview_text']?></div>
                <textarea style="display: none;" class="hidden-content-input"
                          name="post_preview_text">
            <?=$post['post_preview_text'];?>
          </textarea>
              </div>

              <div class="form-group">
                <label for="">Main text</label>
                <div data-name="post_text" id="editor"
                     class="editor_basic"><?=$post['post_text']?></div>
                <textarea id="post_text" style="display: none;"
                          class="hidden-content-input" name="post_text">
            <?=$post['post_text'];?>
          </textarea>
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
                  <input name="published" type="checkbox" checked="checked"
                         value="1">
                  Published
                </label>
              </div>
              <div class="form-group">
                <label for="input-post_date">Date</label>
                <input name="post_datetime" type="text"
                       class="form-control input-sm datetimepicker"
                       id="input-post_date">
              </div>
            </div>
          </div>
        </div>

        <div class="margin-b">
          <button type="submit" class="btn btn-block btn-success">Add post
          </button>
        </div>

    </div>

    </form>
  </div>
</div>



