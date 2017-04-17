<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * LykkeUserAccess model
 * This is the model class for table "{{%lykke_user_access}}".
 *
 * @property integer $id
 * @property integer $lykke_user_id
 * @property integer $admin_panel
 * @property integer $edit_frontend
 */
class LykkeUserAccess extends ActiveRecord {

    public static function tableName() {
        return 'lykke_user_access';
    }

    function access($name) {
        $access
            = LykkeUserAccess::findOne(['lykke_user_id' => Yii::$app->user->id]);
        return !empty($access) ? $access->{$name} : false;
    }

    function accessByNewUser($id) {
        $access = new LykkeUserAccess();
        $access->lykke_user_id = $id;
        $access->save();
    }

    function admin($post) {
        $access = self::findOne(['lykke_user_id' => $post['id']]);
        $access->admin_panel = $post['data'];
        return $access->save() ? true : false;
    }

    function Frontend($post) {
        $access = self::findOne(['lykke_user_id' => $post['id']]);
        $access->edit_frontent = $post['data'];
        return $access->save() ? true : false;
    }

}