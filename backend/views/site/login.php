<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login text-center">
  <p><img src="/img/lykke_new.svg"></p>
  <h1><small>Back Office</small></h1>
    <div class="row text-left">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>



      <a href="https://lykke-auth-dev.azurewebsites.net/connect/authorize?client_id=80b1a982-742d-4e37-9cb6-ba1107203711&redirect_uri=http://lykke-city/control/site/login&response_type=code&scope=openid%20profile%20email%20profile&response_mode=form_post&state=<?=Yii::$app->request->getCsrfToken()?>">Войти</a>

    </div>
</div>
