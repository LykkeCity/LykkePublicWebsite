<?php

use yii\db\Migration;

class m170406_145419_site_pages_add_embeded_col extends Migration
{
    public function safeUp()
    {
        $this->addColumn('site_pages', 'embedded', 'INTEGER NOT NULL DEFAULT 0');
    }

    public function safeDown()
    {
        $this->dropColumn('site_pages', 'embedded');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
