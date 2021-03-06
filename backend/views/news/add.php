<?
use backend\components\helpers\UrlHelper;

$this->title = 'Add news';
?>


<div class="col-md-12">
  <div class="box">
    <div class="box-body">

        <? if ($result == "error") { ?>
          <div class="alert alert-danger">
            Error creating news =(
          </div>
        <? } else {
            if ($result == 'success') { ?>
              <div class="alert alert-success text-center">
                <p><b>News added successfully!</b></p>
                <br>
                <a href="<?=UrlHelper::to(['news/edit', 'id' => $id])?>"
                   class="btn btn-xs btn-success">
                  Edit
                </a>
                <a href="<?=UrlHelper::to(['news/add'])?>"
                   class="btn btn-xs btn-primary">
                  Create new news
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
            <a href="<?=UrlHelper::to(['/news'])?>"
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
                       onkeyup="translit(this, '#input-post_url')"
                       class="form-control input-sm" id="input-title" required>
              </div>
              <div class="form-group">
                <label for="input-post_url">Url</label>
                <input type="text" name="post_url" class="form-control input-sm"
                       id="input-post_url" required>
              </div>

              <div class="form-group">
                <label for="input-post-img">Image</label>
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
          <button type="submit" class="btn btn-block btn-success">Add news
          </button>
        </div>

    </div>

    </form>

  </div>
</div>

