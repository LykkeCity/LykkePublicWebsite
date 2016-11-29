<?php

namespace common\models;
use Yii;
use yii\helpers\Inflector;
use yii\web\UploadedFile;

class BlogPosts extends \yii\db\ActiveRecord {

  public static function tableName() {
    return 'blog_posts';
  }


  public function InsertOrUpdate($post, $id = '') {


    $blogPost = empty($id) ? new BlogPosts() : BlogPosts::findOne($id);

    $postImg = UploadedFile::getInstanceByName('post_img');

    $blogPost->post_title = $post['post_title'];
    $blogPost->post_url = $post['post_url'];
    $blogPost->post_text = $post['post_text'];
    $blogPost->post_preview_text = $post['post_preview_text'];
    $blogPost->post_img = !empty($postImg) ? Inflector::slug(date('Y_m_d_h_i_s_') . $postImg->baseName, '_', TRUE) . '.' . $postImg->extension : $blogPost->post_img;
    $blogPost->post_datetime = date("Y-m-d H:i:s", strtotime($post['post_datetime']));
    $blogPost->post_author = Yii::$app->user->id;
    $blogPost->published = !isset($post['published']) ? 0 : $post['published'];

    if (!empty($postImg)) {
      $resultUpload = $postImg->saveAs(Yii::getAlias('@frontend') . '/web/media/blog/' . $blogPost->post_img);
    }

    if ($resultUpload === FALSE) {
      return FALSE;
    }

    return $blogPost->save() ? $blogPost : FALSE;


  }



}