<?php

return [

   "menu" => [
        "name" => "API Token",
   ],
   "label" => [
        "create" => [
            "name"       => "Create API Token",
            "info"       => "API tokens allow third-party services to authenticate with our application on your behalf.",
            "token_name" => "Token name",
            "permission" => "Permissions",
            "created"    => "Please copy your new API token. For your security, it won\'t be shown again.",
        ],
        "manage" => [
            "name" => "Manage API Token",
            "info" => "You may delete any of your existing tokens if they are no longer needed.",
            "used"  => "Last used",
        ],
        "delete" => [
            "name" => "Delete API Token",
            "info" => "Are you sure you would like to delete this API token?",
        ],
    ],

];
