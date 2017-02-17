<?php


namespace common\classes;


class AssetApi {

  function GetAssetDictionary() {
    try {

      $json = @file_get_contents(getenv('ASSET_DICTIONARY'));

      if ($json === FALSE) {
        throw new Exception();
      }

      return json_decode($json, TRUE);

    } catch (\Exception $e) {
      return FALSE;
    }
  }


  function GetAssetPairDictionary() {
    try {

      $json = @file_get_contents(getenv('ASSET_PAIR_DICTIONARY'));

      if ($json === FALSE) {
        throw new Exception();
      }

      return json_decode($json, TRUE);

    } catch (\Exception $e) {
      return FALSE;
    }
  }


  function GetAssetPairRate() {
    try {

      $json = @file_get_contents(getenv('ASSET_PAIR_RATE'));

      if ($json === FALSE) {
        throw new Exception();
      }

      return json_decode($json, TRUE);

    } catch (\Exception $e) {
      return FALSE;
    }
  }

  function GetAssetsData($asset) {

    $assetsPair = $this->GetAssetPairDictionary();
    $assets = $this->GetAssetDictionary();
    $assetsRate = $this->GetAssetPairRate();

    if (!$assets || !$assetsPair || !$assetsRate) {
      return FALSE;
    }

    foreach ($assetsPair as $pair) {

      $rate = $this->GetDataRateAsset($assetsRate, $pair['id']);
      
      if (strripos($pair['id'], $asset) !== FALSE && !empty($rate)) {
        $assetsPairArray[$pair['id']] = [
          'id'           => $pair['id'],
          'name'         => $pair['name'],
          'baseAsset'    => $this->GetDataBaseAsset($assets, $pair['baseAssetId']),
          'quotingAsset' => $this->GetDataQuotingAsset($assets, $pair['quotingAssetId']),
          'rate'         => $this->GetDataRateAsset($assetsRate, $pair['id'])
        ];
      }

    }

    return $assetsPairArray;

  }


  private function GetDataRateAsset($assetsRate, $asset) {

    foreach ($assetsRate as $rate) {

      if ($rate['id'] === $asset) {
        $assetRate = [
          'bid' => $rate['bid'],
          'ask' => $rate['ask'],
        ];
      }
    }

    return $assetRate;

  }


  private function GetDataBaseAsset($assets, $baseAsset) {

    foreach ($assets as $asset) {

      if ($asset['id'] === $baseAsset) {
        $assetData = [
          'name'           => $asset['name'],
          'bitcoinAssetId' => $asset['bitcoinAssetId'],
        ];
      }
    }

    return $assetData;

  }


  private function GetDataQuotingAsset($assets, $quotingAsset) {

    foreach ($assets as $asset) {

      if ($asset['id'] === $quotingAsset) {
        $assetData = [
          'name'           => $asset['name'],
          'bitcoinAssetId' => $asset['bitcoinAssetId'],
        ];
      }
    }

    return $assetData;

  }

}