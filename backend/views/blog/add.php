<?
use backend\components\helpers\UrlHelper;

$this->title = 'Добавить пост';
$this->params['breadcrumbs'][] = ['label' => 'Блог', 'url' => ['/blog/']];
$this->params['breadcrumbs'][] = $this->title;
?>


<? if ($result == "error") { ?>
  <div class="alert alert-danger">
    Ошибка создания поста =(
  </div>
<? }
else {
  if ($result == 'success') { ?>
    <div class="alert alert-success text-center">
      <p><b>Пост успешно добавлен!</b></p>
      <br>
      <a href="<?= UrlHelper::to(['blog/edit', 'id' => $id]) ?>"
         class="btn btn-xs btn-success">
        Редактировать
      </a>
      <a href="<?= UrlHelper::to(['blog/add']) ?>"
         class="btn btn-xs btn-primary">
        Создать новый пост
      </a>
    </div>
  <? }
} ?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="row margin-b">
    <div class="col-sm-12 text-right">
      <button type="submit"
              class="btn btn-xs btn-success">
        Добавить
      </button>
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
          <input type="text" name="post_title" onkeyup="translit(this, '#input-post_url')"
                 class="form-control input-sm" id="input-title" required>
        </div>
        <div class="form-group">
          <label for="input-post_url">Url</label>
          <input type="text" name="post_url" class="form-control input-sm"
                 id="input-post_url" required>
        </div>

        <div class="form-group">
          <label for="input-post-img">Изображение</label>
          <p><small>рекомендованный размер 1170х755</small></p>
          <input type="file" name="post_img" class="form-control input-sm"
                 id="input-post-img">
        </div>

        <div class="form-group">
          <label for="">Превью текст поста</label>
          <textarea name="post_preview_text" id="editor" class="editor_basic"></textarea>
        </div>

        <div class="form-group">
          <label for="">Текст поста</label>
          <textarea name="post_text" id="editor" class="editor_full"></textarea>
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
          <input name="published" type="checkbox" checked="checked" value="1">
          Опубликован
        </label>
      </div>
      <div class="form-group">
        <label for="input-post_date">Дата</label>
        <input name="post_datetime" type="text"
               class="form-control input-sm datetimepicker" id="input-post_date">
      </div>
    </div>
  </div>
  </div>

  <div class="margin-b">
    <button type="submit" class="btn btn-block btn-success">Добавить пост</button>
  </div>

  </div>
  
  </form>
