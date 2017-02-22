<?php

namespace common\models;
use Yii;
use yii\helpers\Inflector;
use yii\web\UploadedFile;

class News extends \yii\db\ActiveRecord {

  public static function tableName() {
    return 'news_posts';
  }


  public function InsertOrUpdate($post, $id = '') {
    $resultUpload = null;

    $newsPost = empty($id) ? new BlogPosts() : NewsPosts::findOne($id);

    $postImg = UploadedFile::getInstanceByName('news_img');

    $newsPost->news_title = $post['news_title'];
    $newsPost->news_url = $post['news_url'];
    $newsPost->news_text = $post['news_text'];
    $newsPost->news_preview_text = $post['news_preview_text'];
    $newsPost->news_img = !empty($postImg) ? Inflector::slug(date('Y_m_d_h_i_s_') . $postImg->baseName, '_', TRUE) . '.' . $postImg->extension : $newsPost->news_img;
    $newsPost->news_datetime = date("Y-m-d H:i:s", strtotime($post['news_datetime']));
    if (empty($id)) {
      $newsPost->news_author = Yii::$app->user->id;
    }
    $newsPost->published = !isset($post['published']) ? 0 : $post['published'];

    if (!empty($postImg)) {
      $resultUpload = $postImg->saveAs(Yii::getAlias('@frontend') . '/web/media/news/' . $newsPost->news_img);
    }

    if ($resultUpload === FALSE) {
      return FALSE;
    }

    return $newsPost->save() ? $newsPost : FALSE;


  }

  public static function AuthorId($newsId){
    return self::findOne(['id' => $newsId])->news_author;
  }





}