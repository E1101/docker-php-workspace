<?php
return [
    'serverUrl'     => getenv('OAUTH_BASE_URL'),
    'tokenProvider' => new \Poirot\Ioc\instance('/module/oauth2client/services/TokenProvider'),
];
