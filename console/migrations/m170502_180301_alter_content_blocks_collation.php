<?php
use yii\db\Migration;

class m170502_180301_alter_content_blocks_collation extends Migration {

    public function safeUp() {
        $this->execute("
        ALTER TABLE content_blocks CONVERT TO CHARACTER SET utf8
        ");
    }

    public function safeDown() {
        return true;
    }
}
