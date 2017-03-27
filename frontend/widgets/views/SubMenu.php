<nav class="site_nav">
    <div class="site_nav__inner">
        <div class="container">

<!--            --><?// if (!empty($backUrl)) { ?>
<!--                <a href="--><?//=$backUrl?><!--"-->
<!--                   class="btn btn-sm pull-right smooth_scroll btn_affix"-->
<!--                   data-spy="affix">Buy Lykke Coins</a>-->
<!--            --><?// } ?>

            <ul class="header_nav__list nav_list nav_list--alt">
                <? foreach ($subMenu as $item) { ?>
                    <li class="nav_list__item <?=$currentUri == $item['url']
                        ? 'nav_list__item--active' : ''?>">
                        <a href="<?=strripos($item['url'], 'http') === false
                            ? '/'.$item['url']
                            : $item['url']?>"><?=$item['name']?></a>
                    </li>

                <? } ?>
            </ul>
        </div>
    </div>
</nav>