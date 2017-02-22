<?php

use yii\db\Migration;

class m170222_025543_create_new_tables_for_comments extends Migration {
  public function safeUp() {
    $this->tableComments();
    $this->tableCommentsEditedHistory();
    $this->tableCommentsSubscribe();
  }

  public function safeDown() {
    $this->dropTable('comments');
    $this->dropTable('comments_edited_history');
    $this->dropTable('comments_subscribe');
  }


  private function tableComments() {
    $this->execute("CREATE TABLE IF NOT EXISTS comments (
          id int(11) NOT NULL AUTO_INCREMENT,
          comment text NOT NULL,
          lykke_user_id int(11) NOT NULL,
          page_post_id int(11) NOT NULL,
          reply_comment_id int(11) DEFAULT NULL,
          date timestamp NOT NULL,
          deleted int(11) NOT NULL DEFAULT 0,
          spam int(11) NOT NULL DEFAULT 0,
          edited int(11) DEFAULT 0,
          type varchar(255) NOT NULL,
          PRIMARY KEY (id)
        )
        ENGINE = INNODB
        AUTO_INCREMENT = 1
        CHARACTER SET utf8
        COLLATE utf8_general_ci
        ROW_FORMAT = DYNAMIC;");
  }

  private function tableCommentsEditedHistory() {
    $this->execute("CREATE TABLE IF NOT EXISTS comments_edited_history (
      id int(11) NOT NULL AUTO_INCREMENT,
      comments_id int(11) NOT NULL,
      page_post_id int(11) NOT NULL,
      lykke_user_id int(11) NOT NULL,
      comment text NOT NULL,
      datetime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      type varchar(255) NOT NULL,
      PRIMARY KEY (id)
    )
    ENGINE = INNODB
    AUTO_INCREMENT = 1
    CHARACTER SET utf8
    COLLATE utf8_general_ci
    ROW_FORMAT = DYNAMIC;");
  }

  private function tableCommentsSubscribe() {
    $this->execute("CREATE TABLE IF NOT EXISTS comments_subscribe (
        id int(11) NOT NULL AUTO_INCREMENT,
        lykke_user_id int(11) NOT NULL,
        page_post_id int(11) NOT NULL,
        subscribe int(11) NOT NULL,
        type varchar(255) NOT NULL,
        PRIMARY KEY (id)
      )
      ENGINE = INNODB
      AUTO_INCREMENT = 1
      CHARACTER SET utf8
      COLLATE utf8_general_ci
      ROW_FORMAT = DYNAMIC;");
  }


}
