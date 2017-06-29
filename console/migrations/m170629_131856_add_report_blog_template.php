<?php
use yii\db\Migration;

class m170629_131856_add_report_blog_template extends Migration {

    public function safeUp() {
        $this->addColumn('blog_posts', 'report_template',
            'INTEGER NOT NULL DEFAULT 0');
    }

    public function safeDown() {
        $this->dropColumn('blog_posts', 'report_template');
    }
}
