<?
use yii\helpers\Url;

?>

<ul class="nav nav--header">
    <?
    foreach ($siteMenu as $item) { ?>
        <li class="
                <? if($currentUri == $item['url']){ ?>
                    active
                <? }else{ ?>
                    <? if (!empty($item['sub_pages'])) { ?>
                        <? foreach ($item['sub_pages'] as $subItem) { ?>
                            <? if($currentUri == $subItem['url']){  echo $subItem['url']; ?>
                                active
                            <? } ?>
                        <? } ?>
                    <? } ?>
                <? } ?>

            <a class="dropdown__control"
               href="<?=strripos($item['url'], 'http') === false
                   ? '/'.$item['url']
                   : $item['url']?>"><?=$item['name']?>
            </a>

        </li>
    <? } ?>
    <li class="visible-xs">
        <hr>
    </li>
    <li class="visible-xs"><a href="<?=Url::to(['site/signin'])?>">Sign In</a>
    </li>
</ul>
