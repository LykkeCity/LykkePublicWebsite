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
  "/city/privacy_policy"               => "/privacy_policy"
];

$uri = $_SERVER['REQUEST_URI'];

if(array_key_exists($uri, $url)){
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: ".$url[$uri]);
  exit();
}