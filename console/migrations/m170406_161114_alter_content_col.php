<?php

use yii\db\Migration;

class m170406_161114_alter_content_col extends Migration
{
    public function up()
    {
        $this->alterColumn('content_blocks', 'content', 'TEXT(30000)');
    }

    public function down()
    {
//        $this->alterColumn('content_blocks', 'content', '(30000)');

    }

}
