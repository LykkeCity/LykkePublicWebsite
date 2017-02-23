<?php

use yii\db\Migration;

class m170223_141322_crate_table_redirects extends Migration {
  public function safeUp() {
    $this->execute('CREATE TABLE IF NOT EXISTS redirects (
                        id int(11) NOT NULL AUTO_INCREMENT,
                        redirect_with varchar(255) NOT NULL,
                        redirect_to varchar(255) NOT NULL,
                        PRIMARY KEY (id)
                      )
                      ENGINE = INNODB
                      AUTO_INCREMENT = 34
                      AVG_ROW_LENGTH = 606
                      CHARACTER SET utf8
                      COLLATE utf8_general_ci
                      ROW_FORMAT = DYNAMIC
                    ');

    $this->insertData();
  }

  public function safeDown() {
    $this->dropTable('redirects');
  }


  function insertData() {

    $redirects = [
      "/exchange.php"                                                                  => "/exchange",
      "/lykkex_rulebook.php"                                                           => "/lykkex_rulebook",
      "/term_conditions_colored_coins.php"                                             => "/terms_of_issuance",
      "/city.php"                                                                      => "/community",
      "/city/about/openposition"                                                       => "/city/open_positions",
      "/city/blog/index"                                                               => "/city/blog",
      "/corp.php"                                                                      => "/company",
      "/leadership.php"                                                                => "/leadership",
      "/technology.php"                                                                => "/technology",
      "/contacts.php"                                                                  => "/contacts",
      "/city/terms_of_use"                                                             => "/terms_of_use",
      "/city/privacy_policy"                                                           => "/privacy_policy",
      "/city/blog/2017-02-09/1-year_forward_offering"                                  => "/city/blog/1_year_forward_offering",
      "/city/blog/2017-01-26/seo_manager"                                              => "/city/blog/seo_manager",
      "/privacy"                                                                       => "/privacy_policy",
      "/city/blog/2017-01-25/lykke_talk_in_zurich"                                     => "https://temp.lykke.com/city/blog/2017-01-25/lykke_talk_in_zurich",
      "/city/blog/2017-01-20/chronobank"                                               => "https://temp.lykke.com/city/blog/2017-01-20/chronobank",
      "/city/blog/2017-01-19/wisekey"                                                  => "https://temp.lykke.com/city/blog/2017-01-19/wisekey",
      "/city/blog/2016-12-29/terms_of_issuance"                                        => "https://temp.lykke.com/city/blog/2016-12-29/terms_of_issuance",
      "/city/blog/2016-12-29/lykke_to_join_the_hyperledger_project"                    => "https://temp.lykke.com/city/blog/2016-12-29/lykke_to_join_the_hyperledger_project",
      "/city/blog/2016-12-21/demetrios_zamboglou"                                      => "https://temp.lykke.com/city/blog/2016-12-21/demetrios_zamboglou",
      "/city/blog/2016-12-16/solarcoin"                                                => "https://temp.lykke.com/city/blog/2016-12-16/solarcoin",
      "/city/blog/2016-12-12/pws"                                                      => "https://temp.lykke.com/city/blog/2016-12-12/pws",
      "/city/blog/2016-11-22/lykke_streams"                                            => "https://temp.lykke.com/city/blog/2016-11-22/lykke_streams",
      "/city/blog/2016-11-16/vanuatu"                                                  => "https://temp.lykke.com/city/blog/2016-11-16/vanuatu",
      "/city/blog/2016-10-14/blockchain-powered_exchange_captures_1_million_from_fans" => "https://temp.lykke.com/city/blog/2016-10-14/blockchain-powered_exchange_captures_1_million_from_fans",
      "/lykkewallet/privacy_policy.html"                                               => "/privacy_policy",
    ];

    foreach ($redirects as $key => $val) {
      $this->insert('redirects', [
        'redirect_with' => trim(trim($key, '/')),
        'redirect_to'   => trim(trim($val, '/'))
      ]);
    }

  }


}
