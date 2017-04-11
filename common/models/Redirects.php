<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Redirects model
 *
 * @property integer $id
 * @property string  $redirect_with
 * @property string  $redirect_to
 */
class Redirects extends ActiveRecord {

    public static function tableName() {
        return 'redirects';
    }

    function getAllRedirect() {
        return self::find()->asArray()->all();
    }

    function addRedirect($post) {
        $redirect = new Redirects();
        $redirect->redirect_with = trim(trim($post['redirect_with'], '/'));
        $redirect->redirect_to = trim(trim($post['redirect_to'], '/'));
        return $redirect->save() ? $redirect : false;
    }

    function deleteRedirect($id) {
        $redirect = self::findOne($id);
        $redirect->delete();
    }

}