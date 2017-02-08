<?php

namespace common\models;
use Yii;
use yii\helpers\Inflector;
use yii\web\UploadedFile;

class Asset extends \yii\db\ActiveRecord{

  public static function tableName() {
    return 'asset';
  }

  public function InsertOrUpdate($post, $id = '') {

    $resultUpload = null;

    $asset = empty($id) ? new Asset() : Asset::findOne($id);

    $assetImg = UploadedFile::getInstanceByName('asset_img');

    $asset->name = $post['name'];
    $asset->url = $post['url'];
    $asset->content = $post['content'];
    $asset->title = $post['title'];
    $asset->description = $post['description'];
    $asset->keywords = $post['keywords'];
    $asset->coinprism_metadata = $post['coinprism_metadata'];
    $asset->asset_definition = $post['asset_definition'];
    $asset->coin_holders = $post['coin_holders'];
    $asset->show_content = !isset($post['show_content']) ? 0 : $post['show_content'];
    $asset->img = !empty($assetImg) ? Inflector::slug(date('Y_m_d_h_i_s_') . $assetImg->baseName, '_', TRUE) . '.' . $assetImg->extension : $asset->img;


    if (!empty($assetImg)) {
      $resultUpload = $assetImg->saveAs(Yii::getAlias('@frontend') . '/web/media/assets/' . $asset->img);
    }

    if ($resultUpload === FALSE) {
      return FALSE;
    }

    return $asset->save() ? $asset : FALSE;

  }


}