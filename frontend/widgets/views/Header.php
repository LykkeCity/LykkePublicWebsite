<?
use yii\helpers\Url;

?>

<div class="header_container">
  <header class="header">
    <div class="container">
      <div class="header__menu_button">
        <button class="btn btn_menu btn--icon" type="button">
          <span></span>
        </button>
      </div>
      <div class="header__logo header_logo">
        <a href="/">
          <img class="header_logo__img" src="/img/lykke_new.svg"
               height="36"
               alt="lykke_logo">
        </a>
      </div>
      <div class="header__actions header_actions pull-right">
          <? if (!Yii::$app->user->isGuest) { ?>
            <div class="header_actions__logout visible-xs pull-right">
              <a href="<?=Url::to(['site/logout'])?>"
                 class="btn btn--icon btn_logout">
                <i class="icon icon--exit"></i>
              </a>
            </div>

          <? } ?>

        <div class="header_actions__login header_login pull-right">
            <? if (Yii::$app->user->isGuest) { ?>
              <div class="header_user dropdown__control">
                <a href="<?=Url::to(['site/signin'])?>">
                  <div class="header_login__title">Sign in</div>
                </a>
              </div>
            <? } else { ?>
              <div class="header_user dropdown__control">
                <a href="#">
                  <div class="header_user__img">
                    <img src="/img/user_default.svg" width="40"
                         alt="user_image">
                  </div>

                  <div
                      class="header_login__title"><?=Yii::$app->user->identity->first_name?></div>
                </a>
              </div>
              <div class="dropdown__container">
                <ul class="dropdown__nav">
                  <li><a href="<?=Url::to(['site/logout'])?>">Sign
                      Out</a></li>
                </ul>
              </div>
            <? } ?>
        </div>
      </div>
    </div>

    <div class="header_search">
      <div class="container">
        <div class="header_search__inner">
          <div class="header_search__buttons">
            <button type="button"
                    class="btn btn-sm btn--flat hidden-xs btn_close_header">
              Cancel
            </button>
            <button type="button"
                    class="btn btn-sm btn--primary hidden-xs">
              Search
            </button>
            <button type="button"
                    class="btn btn--icon visible-xs btn_close_header">
              <i class="icon icon--cancel_round"></i>
            </button>
          </div>
          <div class="header_search__field">
            <button class="header_search__btn btn btn--icon"
                    type="button">
              <i class="icon icon--search"></i>
            </button>
            <input type="text" class="form-control"
                   placeholder="Search">
          </div>
        </div>
      </div>
    </div>

  </header>
</div>

<div class="header_nav_container">
  <nav class="header_nav">
    <div class="header_nav__inner">
      <div class="container">
        <ul class="header_nav__list nav_list">

            <? foreach ($siteMenu as $item) { ?>
              <li class="nav_list__item
                    <? if ($currentUri == $item['url']) { ?>
                        nav_list__item--active
                    <? } else { ?>
                        <? if (!empty($item['sub_pages'])) { ?>
                            <? foreach ($item['sub_pages'] as $subItem) { ?>
                                <? if ($currentUri == $subItem['url']) { ?>
                                    nav_list__item--active
                                <? } ?>
                            <? } ?>
                        <? } ?>
                    <? } ?>
                    ">
                <a href="<?=strripos($item['url'], 'http') === false ? '/'
                    .$item['url'] : $item['url']?>"><?=$item['name']?>
                </a>
                  <? if (!empty($item['sub_pages'])) { ?>
                    <menu class="header_nav__submenu submenu">
                      <ul class="submenu_list">
                          <? foreach ($item['sub_pages'] as $subItem) { ?>
                            <li class="submenu_list__item
                                <? if ($currentUri == $subItem['url']) { ?>
                                    nav_list__item--active active
                                <? } ?>
                                ">
                                <? if(stripos("xxx".$subItem['url'], 'http')==false){ ?>
                                  <a href="/<?=$subItem['url']?>"><?=$subItem['name']?></a></li>
                                <? }else{ ?>
                                  <a href="<?=$subItem['url']?>"><?=$subItem['name']?></a></li>
                                <? } ?>

                          <? } ?>
                      </ul>
                    </menu>
                  <? } ?>
              </li>
            <? } ?>

        </ul>
      </div>
    </div>
  </nav>
</div>