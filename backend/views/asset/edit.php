<?
use backend\components\helpers\UrlHelper;

$this->title = 'Редактировать актив';
$this->params['breadcrumbs'][] = ['label' => 'Активы', 'url' => ['/asset/']];
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
  <div class="row margin-b">
    <div class="col-sm-12 text-right">
      <button type="submit"
              class="btn btn-xs btn-success">
        Сохранить
      </button>
      <a href="<?= UrlHelper::to(['/asset']) ?>"
         class="btn btn-xs btn-warning">
        Отмена
      </a>
    </div>
  </div>

  <input type="hidden" name="id" value="<?=$asset['id']?>">

  <div class="row">
    <div class="col-md-12">
      <div class="bs-panel">
        <div class="bs-title">Основное</div>

        <div class="form-group">
          <label for="input-name">Название актива</label>
          <input type="text" name="name"
                 class="form-control input-sm" id="input-name" value="<?=$asset['name']?>" required>
        </div>
        <div class="form-group">
          <label for="input-url">Url</label>
          <input type="text" name="url" class="form-control input-sm"
                 id="input-url" value="<?=$asset['url']?>" required>
        </div>

        <div class="form-group">
          <label for="">Описание</label>
          <textarea style="width: 100%" name="content" class="editor_full"><?=$asset['content']?></textarea>
        </div>

        <?php if (!empty($asset['img'])) {?>
          <div class="form-group">
            <label for="">Текущее изображение</label>
            <img style="display: block;max-width: 20%;" src="<?=Yii::$app->urlManager->hostInfo.'/media/assets/'.$asset['img']?>">
          </div>
        <?php } ?>
        <div class="form-group">
          <label for="input-post-img">Изменить изображение</label>
          <input type="file" name="asset_img" class="form-control input-sm"
                 id="input-post-img">
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
                 id="input-title" value="<?=$asset['title']?>">
        </div>
        <div class="form-group">
          <label for="input-keywords">Keywords</label>
          <input type="text" name="keywords" class="form-control input-sm"
                 id="input-keywords" value="<?=$asset['keywords']?>">
        </div>
        <div class="form-group">
          <label for="input-description">Description</label>
          <input type="text" name="description" class="form-control input-sm"
                 id="input-description" value="<?=$asset['description']?>">
        </div>
      </div>
    </div>


    <div class="col-md-12">
      <div class="bs-panel">
        <div class="bs-title">Настройки</div>
        <div class="checkbox">
          <label>
            <input name="show_content" type="checkbox" <?= $asset['show_content'] == 1 ? 'checked="checked"' : ''; ?> value="1">
            Показывать описание
          </label>
        </div>
      </div>
    </div>

  </div>
  <div class="margin-b">
    <button type="submit" class="btn btn-block btn-success">Сохранить</button>
  </div>
</form>
