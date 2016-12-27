<?
use backend\components\helpers\UrlHelper;

$this->title = 'Редактировать пост';
$this->params['breadcrumbs'][] = ['label' => 'Блог', 'url' => ['/blog/']];
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

<form action="" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $post['id'] ?>">
  <div class="row margin-b">
    <div class="col-sm-12 text-right">
      <button type="submit"
              class="btn btn-xs btn-success">
        Сохранить
      </button>
      <a href="<?= UrlHelper::to(['/blog/add']) ?>"
         class="btn btn-xs btn-primary">
        Создать новый пост
      </a>
      <a href="<?= UrlHelper::to(['/blog']) ?>"
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
          <label for="input-title">Заголовок</label>
          <input type="text" name="post_title"
                 class="form-control input-sm" id="input-title" value="<?=$post['post_title']?>" required>
        </div>
        <div class="form-group">
          <label for="input-post_url">Url</label>
          <input type="text" name="post_url" class="form-control input-sm"
                 id="input-post_url" value="<?=$post['post_url']?>" required>
        </div>
        <div class="form-group">
          <label for="">Текущее изображение</label>
          <img style="display: block;max-width: 20%;" src="<?=Yii::$app->urlManager->hostInfo.'/media/blog/'.$post['post_img']?>">
        </div>
        <div class="form-group">
          <label for="input-post-img">Изменить изображение</label>
          <input type="file" name="post_img" class="form-control input-sm"
                 id="input-post-img">
        </div>

        <div class="form-group">
          <label for="">Превью текст поста</label>
          <textarea name="post_preview_text" id="editor" class="editor_basic"><?=$post['post_preview_text']?></textarea>
        </div>

        <div class="form-group">
          <label for="">Текст поста</label>
          <textarea name="post_text" id="editor" class="editor_full"><?=$post['post_text']?></textarea>
        </div>

      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="bs-panel">
        <div class="bs-title">Настройки</div>
        <div class="checkbox">
          <label>
            <input name="published" type="checkbox" <?= $post['published'] == 1 ? 'checked="checked"' : ''; ?> value="1">
            Опубликован
          </label>
        </div>
        <div class="form-group">
          <label for="input-post_date">Дата</label>
          <input name="post_datetime" type="text"
                 class="form-control input-sm datetimepicker" id="input-post_date" value="<?= date("Y/m/d H:i:s", strtotime($post['post_datetime'])); ?>">
        </div>
      </div>
    </div>
  </div>

  <div class="margin-b">
    <button type="submit" class="btn btn-block btn-success">Сохранить</button>
  </div>

  </div>

</form>