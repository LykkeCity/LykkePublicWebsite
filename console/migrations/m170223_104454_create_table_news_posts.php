<?php

use yii\db\Migration;

class m170223_104454_create_table_news_posts extends Migration
{
    public function safeUp()
    {

      $this->execute("
      CREATE TABLE IF NOT EXISTS news_posts (
        id int(11) NOT NULL AUTO_INCREMENT,
        post_title varchar(255) NOT NULL,
        post_url varchar(255) NOT NULL,
        post_text text NOT NULL,
        post_preview_text text NOT NULL,
        post_img varchar(255) DEFAULT NULL,
        post_datetime datetime NOT NULL,
        post_author int(11) NOT NULL,
        published int(11) NOT NULL,
        PRIMARY KEY (id)
      )
      ENGINE = INNODB
      AUTO_INCREMENT = 2
      AVG_ROW_LENGTH = 16384
      CHARACTER SET utf8
      COLLATE utf8_general_ci
      ROW_FORMAT = DYNAMIC;
      ");

    }

    public function safeDown()
    {
        $this->dropTable('news_posts');
    }

}
