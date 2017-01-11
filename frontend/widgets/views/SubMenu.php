<nav class="page_nav page__nav">
  <div class="page_nav__inner">
    <div class="container">

      <? if (!empty($backUrl)) {?>
        <a href="<?=$backUrl?>" class="back_link"></a>
      <? }?>

      <ul class="page_nav__list">
        <? foreach ($subMenu as $item) { ?>
          <li
            class="page_nav__item  <?= $currentUri == $item['url'] ? 'active' : '' ?>">
            <a href="<?= strripos($item['url'], 'http') === false ? '/'.$item['url'] : $item['url'] ?>"><?= $item['name'] ?></a>
          </li>
        <? } ?>
      </ul>
    </div>
  </div>
</nav>
