<?php


namespace common\models;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

class AssetPair extends \yii\db\ActiveRecord{

  public static function tableName() {
    return 'asset_pair';
  }


  public function InsertPair($post) {

    $assetPair = new AssetPair();

    $assetPair->asset_basic_id = $post['asset_basic_id'];
    $assetPair->asset_quote_id = $post['asset_quote_id'];

    return $assetPair->save() ? $assetPair : FALSE;

  }

  public function GetAssetPairs(){

    $query = new Query;
    $query->select('pair.id, 
                    asset1.show_content as show_content_ab, 
                    asset2.show_content as show_content_aq, 
                    asset1.url as url_ab, 
                    asset2.url as url_aq, 
                    asset1.name AS asset_basic,
                    asset2.name AS asset_quote')
      ->from( self::tableName() . ' as pair')
      ->leftJoin(Asset::tableName().' asset1', 'asset1.id = pair.asset_basic_id')
      ->leftJoin(Asset::tableName().' asset2', 'asset2.id = pair.asset_quote_id');
    $command = $query->createCommand();
    $resp = $command->queryAll();

    return $resp;

  }


}