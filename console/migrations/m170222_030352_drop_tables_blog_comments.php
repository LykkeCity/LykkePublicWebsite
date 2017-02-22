<?php

use yii\db\Migration;

class m170222_030352_drop_tables_blog_comments extends Migration {
  public function safeUp() {

    $this->copyDataBlogComments();
    $this->copyDataBlogCommentsEditedHistory();
    $this->copyDataBlogCommentsSubscribe();

    $this->dropTable('blog_comments');
    $this->dropTable('blog_comments_edited_history');
    $this->dropTable('blog_comments_subscribe');
  }


  private function copyDataBlogComments() {
    $blog_comments = $this->db->createCommand("select * from blog_comments")
      ->query();

    if (!empty($blog_comments)) {
      foreach ($blog_comments as $itm) {

        $this->db->createCommand()->insert("comments", [
          'comment'          => $itm['comment'],
          'lykke_user_id'    => $itm['lykke_user_id'],
          'page_post_id'     => $itm['blog_post_id'],
          'reply_comment_id' => empty($itm['reply_comment_id']) ? NULL : $itm['reply_comment_id'],
          'date'             => $itm['date'],
          'deleted'          => $itm['deleted'],
          'spam'             => $itm['spam'],
          'edited'           => $itm['edited'],
          'type'             => 'blog',
        ])->execute();
      }

    }
  }

  private function copyDataBlogCommentsEditedHistory() {
    $blog_comments_edited_history = $this->db->createCommand("select * from blog_comments_edited_history")
      ->query();

    if (!empty($blog_comments_edited_history)) {
      foreach ($blog_comments_edited_history as $itm) {

        $this->db->createCommand()->insert("comments_edited_history", [
          'comments_id'   => $itm['comments_id'],
          'page_post_id'  => $itm['blog_post_id'],
          'lykke_user_id' => $itm['lykke_user_id'],
          'comment'       => $itm['comment'],
          'datetime'      => $itm['datetime'],
          'type'          => 'blog',
        ])->execute();
      }

    }
  }


  private function copyDataBlogCommentsSubscribe() {
    $blog_comments_subscribe = $this->db->createCommand("select * from blog_comments_subscribe")
      ->query();

    if (!empty($blog_comments_subscribe)) {
      foreach ($blog_comments_subscribe as $itm) {

        $this->db->createCommand()->insert("comments_subscribe", [
          'page_post_id'  => $itm['blog_post_id'],
          'lykke_user_id' => $itm['lykke_user_id'],
          'subscribe'     => $itm['subscribe'],
          'type'          => 'blog',
        ])->execute();
      }

    }
  }

  public function safeDown() {
    $create_table_blog_comments = "
      CREATE TABLE IF NOT EXISTS blog_comments (
        id int(11) NOT NULL AUTO_INCREMENT,
        comment text NOT NULL,
        lykke_user_id int(11) NOT NULL,
        blog_post_id int(11) NOT NULL,
        reply_comment_id int(11) DEFAULT NULL,
        date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        deleted int(11) NOT NULL DEFAULT 0,
        spam int(11) NOT NULL DEFAULT 0,
        edited int(11) DEFAULT 0,
        PRIMARY KEY (id)
      )
      ENGINE = INNODB
      AUTO_INCREMENT = 2
      CHARACTER SET utf8
      COLLATE utf8_general_ci
      ROW_FORMAT = DYNAMIC;
    ";


    $create_table_blog_comments_edited_history = "
        CREATE TABLE IF NOT EXISTS blog_comments_edited_history (
          id int(11) NOT NULL AUTO_INCREMENT,
          comments_id int(11) NOT NULL,
          blog_post_id int(11) NOT NULL,
          lykke_user_id int(11) NOT NULL,
          comment text NOT NULL,
          datetime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          PRIMARY KEY (id)
        )
        ENGINE = INNODB
        AUTO_INCREMENT = 1
        CHARACTER SET utf8
        COLLATE utf8_general_ci
        ROW_FORMAT = DYNAMIC;
    ";


    $create_table_blog_comments_subscribe = "
        CREATE TABLE IF NOT EXISTS blog_comments_subscribe (
          id int(11) NOT NULL AUTO_INCREMENT,
          lykke_user_id int(11) NOT NULL,
          blog_post_id int(11) NOT NULL,
          subscribe int(11) NOT NULL,
          PRIMARY KEY (id)
        )
        ENGINE = INNODB
        AUTO_INCREMENT = 2
        CHARACTER SET utf8
        COLLATE utf8_general_ci
        ROW_FORMAT = DYNAMIC
    ";

    $this->execute($create_table_blog_comments);
    $this->execute($create_table_blog_comments_edited_history);
    $this->execute($create_table_blog_comments_subscribe);

  }
}
