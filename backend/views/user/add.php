<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use backend\components\helpers\UrlHelper;

$this->title = 'Добавить пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['/user/']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

  <div class="row margin-b">
    <div class="col-sm-12 text-right">

      <?= Html::submitButton('Добавить', ['class' => 'btn btn-xs btn-success', 'name' => 'signup-button']) ?>

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

        <?= $form->field($model, 'firstname')->textInput(['autofocus' => true, 'class' => 'form-control input-sm']) ?>

        <?= $form->field($model, 'lastname')->textInput(['class' => 'form-control input-sm']) ?>

        <?= $form->field($model, 'email')->textInput(['class' => 'form-control input-sm']) ?>

        <?= $form->field($model, 'username')->textInput(['class' => 'form-control input-sm']) ?>

        <?= $form->field($model, 'password')->textInput(['class' => 'form-control input-sm'])->passwordInput() ?>

      </div>
    </div>
  </div>

  <div class="margin-b"">
    <?= Html::submitButton('Добавить', ['class' => 'btn btn-block btn-success', 'name' => 'signup-button']) ?>
  </div>

<?php ActiveForm::end(); ?>