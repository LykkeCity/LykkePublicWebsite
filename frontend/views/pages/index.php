<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;

?>

<article class="content">

    <section class="text section--padding section--lead">
        <div class="<?=$page['normal_tpl'] == 1 ? 'col-sm-8 automargin'
            : ''?>">
            <div class="inline-edit"
                 data-page-id="<?=Yii::$app->controller->pageId?>">
                <?=$page['content']?>
            </div>
        </div>
    </section>

</article>


<?=Footer::widget();?>