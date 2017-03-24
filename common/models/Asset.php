<?php
namespace common\models;

use Yii;
use yii\helpers\Inflector;
use yii\web\UploadedFile;

class Asset extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'asset';
    }

    function add($post)
    {
        $asset = new self;
        $asset->name = $post['name'];

        return $asset->save() ? $asset : false;
    }

}