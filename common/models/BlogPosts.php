<?php
namespace common\models;

use Yii;
use yii\helpers\Inflector;
use yii\web\UploadedFile;

class BlogPosts extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'blog_posts';
    }

    public function InsertOrUpdate($post, $id = '')
    {
        $resultUpload = null;
        $blogPost = empty($id) ? new BlogPosts() : BlogPosts::findOne($id);
        $postImg = UploadedFile::getInstanceByName('post_img');
        $blogPost->post_title = $post['post_title'];
        $blogPost->post_url = $post['post_url'];
        $blogPost->post_text = $post['post_text'];
        $blogPost->post_preview_text = $post['post_preview_text'];
        $blogPost->post_img = !empty($postImg)
            ? Inflector::slug(date('Y_m_d_h_i_s_').$postImg->baseName, '_',
                true).'.'.$postImg->extension : $blogPost->post_img;
        $blogPost->post_datetime = date("Y-m-d H:i:s",
            strtotime($post['post_datetime']));
        if (empty($id)) {
            $blogPost->post_author = Yii::$app->user->id;
        }
        $blogPost->published = !isset($post['published']) ? 0
            : $post['published'];
        if (!empty($postImg)) {
            $resultUpload = $postImg->saveAs(Yii::getAlias('@frontend')
                .'/web/media/blog/'.$blogPost->post_img);
        }
        if ($resultUpload === false) {
            return false;
        }

        return $blogPost->save() ? $blogPost : false;
    }

    public static function AuthorId($postId)
    {
        return self::findOne(['id' => $postId])->post_author;
    }

}