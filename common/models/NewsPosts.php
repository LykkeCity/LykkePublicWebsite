<?php

namespace common\models;

use Yii;
use yii\helpers\Inflector;
use yii\web\UploadedFile;

/**
 * NewsPosts model
 * This is the model class for table "{{%news_posts}}".
 *
 * @property integer $id
 * @property string  $post_title
 * @property string  $post_url
 * @property string  $post_text
 * @property string  $post_preview_text
 * @property string  $post_img
 * @property string  $post_datetime
 * @property integer $post_author
 * @property integer $published
 */
class NewsPosts extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'news_posts';
    }

    public function InsertOrUpdate($post, $id = '') {
        $resultUpload = null;
        $newsPost = empty($id) ? new NewsPosts() : NewsPosts::findOne($id);
        $postImg = UploadedFile::getInstanceByName('post_img');
        $newsPost->post_title = $post['post_title'];
        $newsPost->post_url = $post['post_url'];
        $newsPost->post_text = $post['post_text'];
        $newsPost->post_preview_text = $post['post_preview_text'];
        $newsPost->post_img = !empty($postImg)
            ? Inflector::slug(date('Y_m_d_h_i_s_').$postImg->baseName, '_',
                true).'.'.$postImg->extension : $newsPost->post_img;
        $newsPost->post_datetime = date("Y-m-d H:i:s",
            strtotime($post['post_datetime']));
        if (empty($id)) {
            $newsPost->post_author = Yii::$app->user->id;
        }
        $newsPost->published = !isset($post['published']) ? 0
            : $post['published'];
        if (!empty($postImg)) {
            $resultUpload = $postImg->saveAs(Yii::getAlias('@frontend')
                .'/web/media/news/'.$newsPost->post_img);
        }
        if ($resultUpload === false) {
            return false;
        }
        return $newsPost->save() ? $newsPost : false;
    }

    public static function AuthorId($postId) {
        return self::findOne(['id' => $postId])->post_author;
    }

}