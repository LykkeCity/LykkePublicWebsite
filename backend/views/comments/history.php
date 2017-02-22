<? foreach ($history as $item) { ?>

  <div >
    <div><b>Date: <?= $item['datetime'] ?></b></div>
    <div><em><?= $item['comment'] ?></em></div>
  </div>
  <hr>

<? } ?>