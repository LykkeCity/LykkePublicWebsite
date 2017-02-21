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
  
 <?php foreach ($assetsPairData as $assetPair) {?>
        <tr>
          <td><?=$assetPair['name']?></td>
          <td>
            <?php if (!empty($assetPair['baseAsset']['bitcoinAssetId'])) {?>
              <a href="https://blockchainexplorer.lykke.com/asset/<?=$assetPair['baseAsset']['bitcoinAssetId']?>"><?=$assetPair['baseAsset']['name']?></a>
            <?php }else{ ?>
              <div><?=$assetPair['baseAsset']['name']?></div>
            <?php } ?>
          </td>
          <td>
            <?php if (!empty($assetPair['quotingAsset']['bitcoinAssetId'])) {?>
              <a href="https://blockchainexplorer.lykke.com/asset/<?=$assetPair['quotingAsset']['bitcoinAssetId']?>"><?=$assetPair['quotingAsset']['name']?></a>
            <?php }else{ ?>
              <div><?=$assetPair['quotingAsset']['name']?></div>
            <?php } ?>
          </td>
          <td class="bid_<?=$assetPair['id']?>"><?=$assetPair['rate']['bid'] == 0 ?'-': $assetPair['rate']['bid']; ?></td>
          <td class="ask_<?=$assetPair['id']?>"><?=$assetPair['rate']['ask'] == 0 ?'-': $assetPair['rate']['bid'];?></td>
        </tr>
       <?php } ?>
  </tbody>
</table>