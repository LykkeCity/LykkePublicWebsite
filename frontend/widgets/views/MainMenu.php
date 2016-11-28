<ul class="nav nav--header">
  <? foreach ($siteMenu as $item) { ?>
    <li
      class="_add_active_exchange <?= $currentUri == $item['url'] ? 'active' : '' ?>">
      <a class="dropdown__control"
         href="<?= strripos($item['url'], 'http') === false ? '/'.$item['url'] : $item['url'] ?>"><?= $item['name'] ?></a>
      <? if (!empty($item['sub_pages'])) { ?>
        <div class="dropdown__container">
          <ul class="dropdown__nav">
            <? foreach ($item['sub_pages'] as $subItem) { ?>
              <li>
                <a href="<?= strripos($subItem['url'], 'http') === false ? '/'.$subItem['url'] : $subItem['url'] ?>"><?= $subItem['name'] ?>
                </a>
              </li>
            <? } ?>
          </ul>
        </div>
      <? } ?>
    </li>
  <? } ?>
</ul>