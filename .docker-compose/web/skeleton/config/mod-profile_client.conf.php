<?php
use Poirot\ApiClient\AccessTokenObject;
use Poirot\ApiClient\TokenProviderSolid;

use Module\ProfileClient\Module;
use Module\ProfileClient\Services\ServiceClientOfProfile;

use Module\Autoly\Authorization\IdentifierSessionWithTokenAssertion;


return [
    Module::CONF => [
        ServiceClientOfProfile::CONF =>
        [
            'server_url'     => getenv('API_BASE_URL'),


            // Use Token Behalf Of Authenticated User
            //
            // TODO use module manager feature on modules load complete injection
            'token_provider' => function ()
            {
                /** @var IdentifierSessionWithTokenAssertion $identifier */
                $identifier = \Module\Authorization\Actions::Authenticator(
                    \Module\Autoly\Module::AUTH_REALM )->hasAuthenticated();


                if ( $identifier )
                    return $identifier->insTokenProvider();

                return new TokenProviderSolid(
                    new AccessTokenObject(['access_token' => 'none'])
                );
            }
        ],
    ],
];
