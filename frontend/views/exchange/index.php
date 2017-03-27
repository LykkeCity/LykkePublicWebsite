<?
use frontend\widgets\Asset;
use frontend\widgets\Footer;

?>

<article class="content">
    <section class="exchange section--padding">
        <div class="container">
            <div class="row">

                <div class="col-sm-10 col-md-8 automargin">

                    <div class="inline-edit"
                         data-page-id="<?=Yii::$app->controller->pageId?>">
                        <?=$page['content']?>
                    </div>

                    <div class="table-header">
                        <div id="ratestime"
                             class="pull-right text-muted marked-data hidden-xs"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <? foreach ($assets as $asset) { ?>
                                <li role="presentation"
                                    class="<?=$asset === reset($assets)
                                        ? 'active' : ''?>"><a
                                        href="#tab_<?=$asset['name']?>"
                                        aria-controls="tab_<?=$asset['name']?>"
                                        role="tab"
                                        data-toggle="tab"><?=$asset['name']?></a>
                                </li>
                            <? } ?>
                        </ul>
                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        <? foreach ($assets as $asset) { ?>
                            <div role="tabpanel"
                                 class="tab-pane <?=$asset === reset($assets)
                                     ? 'active' : ''?>"
                                 id="tab_<?=$asset['name']?>">
                                <div class="table-responsive"
                                     id="RatesTable<?=$asset['name']?>">
                                    <?=Asset::widget(['asset' => $asset['name']])?>
                                </div>
                            </div>
                        <? } ?>


                    </div>
                </div>
            </div>
    </section>

</article>

<?=Footer::widget();?>
