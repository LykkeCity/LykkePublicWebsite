<?php

require(__DIR__ . '/vendor/autoload.php');

//Loads environment
if (file_exists(__DIR__ . '/.env')) {
  $dotenv = new Dotenv\Dotenv(__DIR__ . '/');
  $dotenv->load();
}