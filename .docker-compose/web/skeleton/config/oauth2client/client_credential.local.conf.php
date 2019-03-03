<?php
/**
 * @see \Module\OAuth2Client\Services\ServiceOAuthClient
 */
return [
    'base_url'      => getenv('OAUTH_BASE_URL'), // http://172.19.0.1:8000/
    'client_id'     => getenv('OAUTH_CLIENT_ID'),
    'client_secret' => getenv('OAUTH_CLIENT_SECRET'),

    'scopes'        => [],

    /** @see \Poirot\OAuth2Client\Client */
];
