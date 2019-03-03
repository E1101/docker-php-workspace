<?php
/**
 * @see \Module\OAuth2Client\Actions\ServiceAssertTokenAction
 */
return [
    // Not Connect to OAuth Server and Used Asserted Token With OwnerObject Below
    'debug_mode'  => filter_var(getenv('OAUTH_DEBUG_MODE'), FILTER_VALIDATE_BOOLEAN),
    'debug_token' => [
        'client_identifier' => getenv('OAUTH_DEBUG_CLIENTID'),
        'owner_identifier'  => getenv('OAUTH_DEBUG_OWNERID'),
        'scopes'            => explode(' ', getenv('OAUTH_DEBUG_SCOPES')),

        /** @see \Poirot\OAuth2Client\Model\Entity\AccessToken */
    ],


    // AssertByInternalServer
    /*
    'token_assertion' => new \Poirot\Ioc\instance(
        '/module/oauth2/services/AssertToken'
    ),
    */

    'token_assertion' => new \Poirot\Ioc\instance(
        \Poirot\OAuth2Client\Assertion\AssertByRemoteServer::class
        , [
            // Client Argument Attained From Registered Service
            'client' => new \Poirot\Ioc\instance('/module/oauth2client/services/OAuthClient'),
        ]
        , IOC::GetIoC() // instance token_assertion is belong to tokenAssertion Action
    // so instantiated of classes execute through ActionContainer
    // that cause to validation against callables, so we pass service
    // container itself to instance
    ),
];
