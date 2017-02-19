<?php
//TODO - переделать

$url = [
  "/exchange.php"                      => "/exchange",
  "/lykkex_rulebook.php"               => "/lykkex_rulebook",
  "/term_conditions_colored_coins.php" => "/terms_of_issuance",
  "/city.php"                          => "/community",
  "/city/about/openposition"           => "/city/open_positions",
  "/city/blog/index"                   => "/city/blog",
  "/corp.php"                          => "/company",
  "/leadership.php"                    => "/leadership",
  "/technology.php"                    => "/technology",
  "/contacts.php"                      => "/contacts",
  "/city/terms_of_use"                 => "/terms_of_use",
  "/city/privacy_policy"               => "/privacy_policy",
  "/city/blog/2017-02-09/1-year_forward_offering"  => "/blog/1_year_forward_offering",
  "/city/blog/2017-01-26/seo_manager"  => "/city/blog/seo_manager"
];

$uri = $_SERVER['REQUEST_URI'];

if(array_key_exists($uri, $url)){
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: ".$url[$uri]);
  exit();
}