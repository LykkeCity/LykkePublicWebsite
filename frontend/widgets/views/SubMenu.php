<nav class="site_nav">
    <div class="site_nav__inner">
        <div class="container">
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