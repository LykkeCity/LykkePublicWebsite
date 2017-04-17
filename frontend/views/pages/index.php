<?
use frontend\widgets\Footer;
?>

<article class="content">

    <section class="section--padding section--lead">
        <div class="<?=$page['normal_tpl'] == 1 ? 'col-sm-8 automargin' : ''?>">
            <div data-page-id="<?=Yii::$app->controller->pageId?>">
                <?=$page['content']?>
            </div>
        </div>
    </section>

</article>

<?=Footer::widget();?>