<?php

use yii\db\Migration;

class m170223_115630_add_field_in_user_table extends Migration
{
    public function safeUp()
    {
      $this->addColumn('lykke_user', 'kyc_status', 'VARCHAR(255) NOT NULL AFTER email');
    }

    public function safeDown()
    {
      $this->dropColumn('lykke_user', 'kyc_status');
    }
  
}
