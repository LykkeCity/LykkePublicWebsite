<?php

use yii\db\Migration;

/**
 * Handles the creation of table `content_block`.
 */
class m170406_083622_create_content_block_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('content_blocks', [
            'id' => $this->primaryKey(),
            'pageId' => $this->integer(),
            'ordering' => $this->integer(),
            'name' => $this->string(),
            'title' => $this->string(),
            'content' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('content_blocks');
    }
}
