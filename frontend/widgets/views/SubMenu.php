<nav class="page_nav">
  <div class="page_nav__inner">
    <div class="container">
      <ul class="page_nav__list">
        <? foreach ($subMenu as $item) { ?>
          <li
            class="page_nav__item  <?= $currentUri == $item['url'] ? 'active' : '' ?>">
            <a href="<?= $item['url'] ?>"><?= $item['name'] ?></a>
          </li>
        <? } ?>
      </ul>
    </div>
  </div>
</nav>