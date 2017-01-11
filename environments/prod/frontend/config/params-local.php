<?php
$oAuthLykkeUrlServer = '';

return [
  'oAuthLykke' => [
    'urlAuthorize' => $oAuthLykkeUrlServer."/connect/authorize",
    'urlLogout' => $oAuthLykkeUrlServer."/connect/logout",
    'urlToken' => $oAuthLykkeUrlServer."/connect/token",
    'urlUserInfo' => $oAuthLykkeUrlServer."/connect/userinfo",
    'clientId' => "",
    'clientSecret' => "",
  ]

];
