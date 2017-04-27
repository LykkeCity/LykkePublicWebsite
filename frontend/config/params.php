<?php
$oAuthHost = trim(getenv('OAUTH_HOST'), '/');
$hostname = $_SERVER['HTTP_HOST'];
$staging_needle = getenv('STAGING_NEEDLE');
if ($staging_needle == ''){
    $staging_needle = 'staging';
}
if (stristr($hostname, $staging_needle)) {
    $clientID = getenv('OAUTH_CLIENT_ID_STAGING');
    $clientSecret = getenv('OAUTH_CLIENT_SECRET_STAGING');
    $redirect_uri = getenv('OAUTH_REDIRECT_URI_STAGING');

} else {
    $clientID = getenv('OAUTH_CLIENT_ID');
    $clientSecret = getenv('OAUTH_CLIENT_SECRET');
    $redirect_uri = getenv('OAUTH_REDIRECT_URI');
}

if ($redirect_uri == '') {
    $redirect_uri = 'https://'.$_SERVER['HTTP_HOST'].'/site/auth';
}

return [
    'adminEmail' => 'admin@example.com',
    'oAuthLykke' => [
        'urlAuthorize' => $oAuthHost."/connect/authorize",
        'urlLogout' => $oAuthHost."/connect/logout",
        'urlKycStatus' => $oAuthHost."/getkycstatus",
        'urlToken' => $oAuthHost."/connect/token",
        'urlUserInfo' => $oAuthHost."/connect/userinfo",
        'clientId' => $clientID,
        'clientSecret' => $clientSecret,
        'redirectUri' => $redirect_uri,
    ],
];
