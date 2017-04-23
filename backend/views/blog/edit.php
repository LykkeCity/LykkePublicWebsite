<?
use backend\components\helpers\UrlHelper;

$this->title = 'Edit post';
$this->params['breadcrumbs'][] = ['label' => 'Blog', 'url' => ['/blog/']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12">
  <div class="box">
    <div class="box-body">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$post['id']?>">
        <div class="row margin-b">
          <div class="col-sm-12 text-right">
            <button type="submit"
                    class="btn btn-xs btn-success">
              Save
            </button>
            <a href="<?=UrlHelper::to(['/blog/add'])?>"
               class="btn btn-xs btn-primary">
              Create new post
            </a>
            <a href="<?=UrlHelper::to(['/blog'])?>"
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
                <input type="text" name="post_title"
                       class="form-control input-sm" id="input-title"
                       value="<?=$post['post_title']?>" required>
              </div>
              <div class="form-group">
                <label for="input-post_url">Url</label>
                <input type="text" name="post_url" class="form-control input-sm"
                       id="input-post_url" value="<?=$post['post_url']?>"
                       required>
              </div>
              <div class="form-group">
                <label for="">Current image</label>
                <img style="display: block;max-width: 20%;"
                     src="<?=Yii::$app->urlManager->hostInfo.'/media/blog/'
                     .$post['post_img']?>">
              </div>
              <div class="form-group">
                <label for="input-post-img">Change image</label>
                <p>
                  <small>recommended size 1170х755</small>
                </p>
                <input type="file" name="post_img" class="form-control input-sm"
                       id="input-post-img">
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
                  <input name="published" type="checkbox" <?=$post['published']
                  == 1 ? 'checked="checked"' : '';?> value="1">
                  Published
                </label>
              </div>
              <div class="form-group">
                <label for="input-post_date">Date</label>
                <input name="post_datetime" type="text"
                       class="form-control input-sm datetimepicker"
                       id="input-post_date" value="<?=date("Y/m/d H:i:s",
                    strtotime($post['post_datetime']));?>">
              </div>
            </div>
          </div>
        </div>

        <div class="margin-b">
          <button type="submit" class="btn btn-block btn-success">Save</button>
        </div>

    </div>

    </form>

  </div>
</div>
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

