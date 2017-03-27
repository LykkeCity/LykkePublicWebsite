<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;

?>

<article class="content">
    <div class="inline-edit"
         data-page-id="<?=Yii::$app->controller->pageId?>">
        <?=$page['content']?>
    </div>
</article>


<?=Footer::widget();?>