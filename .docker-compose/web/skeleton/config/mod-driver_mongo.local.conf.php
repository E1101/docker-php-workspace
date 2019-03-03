<?php
return [
    Module\MongoDriver\Module::CONF_KEY
    => [

        ## Your extended repository settings can be add as an item into this:
        \Module\MongoDriver\Services\aServiceRepository::CONF_REPOSITORIES => [
            ## Configuration of Repository Service To Register And Retrieve From IOC,
            #- Usually Implemented with modules that implement mongo usage
            #- with specific key name as repo name.
            // @see aServiceRepository bellow
            \Module\MongoDriver\Services\aServiceRepository::class
            => [
                // default db name
                'db_name' => getenv('DB_MONGO_DBNAME'),
                'client'  => 'master',
            ],
        ],

        // Client Connections By Name:
        /** @see MongoDriverManagementFacade::getClient */
        'clients' => [
            'master' => [
                'host' => 'mongodb://'.getenv('DB_MONGO_HOST').'/',
            ],
        ],
    ],
];
