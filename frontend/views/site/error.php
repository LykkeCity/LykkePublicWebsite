<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
use yii\helpers\Html;
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;

$this->title = $name;
?>
<article class="content content-block container" style="padding-top: 270px;">
    <div class="row ">
        <div class="col-md-9 col-md-offset-1 col-sm-12 text-center">

            <h1><?=Html::encode($this->title)?></h1>

            <?=nl2br(Html::encode($message))?>
        </div>

</article>
<div style="position: absolute; bottom: 0px; width: 100%;">
    <?=Footer::widget();?>
</div>

