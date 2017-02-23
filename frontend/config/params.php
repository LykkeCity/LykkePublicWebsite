<?php

$oAuthHost = trim(getenv('OAUTH_HOST'), '/');

return [
  'adminEmail' => 'admin@example.com',
  'oAuthLykke' => [
    'urlAuthorize' => $oAuthHost . "/connect/authorize",
    'urlLogout'    => $oAuthHost . "/connect/logout",
    'urlKycStatus'    => $oAuthHost . "/getkycstatus",
    'urlToken'     => $oAuthHost . "/connect/token",
    'urlUserInfo'  => $oAuthHost . "/connect/userinfo",
    'clientId'     => getenv('OAUTH_CLIENT_ID'),
    'clientSecret' => getenv('OAUTH_CLIENT_SECRET'),
  ]
];
