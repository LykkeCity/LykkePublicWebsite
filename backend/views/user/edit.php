
<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use backend\components\helpers\UrlHelper;

$this->title = 'Редактировать пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['/user/']];
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

<?php $form = ActiveForm::begin(['id' => 'form-UpdateUserForm']); ?>

<div class="row margin-b">
  <div class="col-sm-12 text-right">

    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-xs btn-success', 'name' => 'UpdateUserForm-button']) ?>

    <a href="<?= UrlHelper::to(['/user']) ?>"
       class="btn btn-xs btn-warning">
      Отмена
    </a>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="bs-panel">
      <div class="bs-title">Основное</div>

      <?= $form->field($model, 'firstname')->textInput(['value' => $user['firstname'],'autofocus' => true, 'class' => 'form-control input-sm']) ?>

      <?= $form->field($model, 'lastname')->textInput(['value' => $user['lastname'],'class' => 'form-control input-sm']) ?>

      <?= $form->field($model, 'email')->textInput(['value' => $user['email'], 'class' => 'form-control input-sm']) ?>

      <?= $form->field($model, 'username')->textInput(['value' => $user['username'], 'class' => 'form-control input-sm']) ?>

      <?= $form->field($model, 'password')->textInput(['class' => 'form-control input-sm'])->passwordInput() ?>

    </div>
  </div>
</div>

<div class="margin-b"">
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-block btn-success', 'name' => 'UpdateUserForm-button']) ?>
</div>

<?php ActiveForm::end(); ?>
