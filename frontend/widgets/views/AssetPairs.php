<?php
use yii\helpers\Url;
?>

<table class="table">
  <tbody>
  <tr>
    <th>Asset pair</th>
    <th>Asset1</th>
    <th>Asset2</th>
    <th>Bid price</th>
    <th>Ask price</th>
  </tr>
  
 <?php foreach ($assetPairs as $assetPair) {?>
      <?php if ($assetPair['asset_quote'] == $asset || $assetPair['asset_basic'] == $asset) {?>
        <tr>
          <td><?=$assetPair['asset_basic']?><?=$assetPair['asset_quote']?></td>
          <td>
            <?php if ($assetPair['show_content_ab'] == 1) {?>
              <a href="<?=Url::to([$pageUrl.'/'.$assetPair['url_ab']])?>"><?=$assetPair['asset_basic']?></a>
            <?php }else{ ?>
              <div><?=$assetPair['asset_basic']?></div>
            <?php } ?>
          </td>
          <td>
            <?php if ($assetPair['show_content_aq'] == 1) {?>
              <a href="<?=Url::to([$pageUrl.'/'.$assetPair['url_aq']])?>"><?=$assetPair['asset_quote']?></a>
            <?php }else{ ?>
              <div><?=$assetPair['asset_quote']?></div>
            <?php } ?>
          </td>
          <td>737.607</td>
          <td>737.854</td>
        </tr>
       <?php } ?>
  <?php } ?>
  </tbody>
</table>