<?php

use yii\db\Migration;

class m170223_103718_add_page_news extends Migration {
  public function safeUp() {

    $this->execute("
        INSERT INTO site_pages(name, url, content, parent, datetime, title, keywords, description, author, route, published, in_menu, template, normal_tpl) VALUES('News', 'company/news', '', '13', '2017-02-23 11:16:37', '', '', '', 1, 'news/index', 1, 0, 'index', 0);
      ");


  }

  public function safeDown() {
      $this->delete('site_pages', ['name' => 'News', 'url' => 'company/news']);
  }

}
