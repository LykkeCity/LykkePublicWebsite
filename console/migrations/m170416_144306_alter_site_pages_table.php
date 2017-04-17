<?php
use yii\db\Migration;

class m170416_144306_alter_site_pages_table extends Migration {

    public function safeUp() {
        $this->alterColumn('site_pages', 'name', 'VARCHAR(255)');
        $this->alterColumn('site_pages', 'url', 'VARCHAR(255) DEFAULT NULL');
    }

    public function safeDown() {
        $this->alterColumn('site_pages', 'name', 'VARCHAR(255) NOT NULL');
        $this->alterColumn('site_pages', 'url', 'VARCHAR(255) NOT NULL');
    }
}
