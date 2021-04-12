<?php

return [

   "menu" => [
    "name"    => "Profile",
    "label"   => "Manage account",
    "profile" => "Edit profile",
   ],
   "label" => [
        "profile" => [
            "name" => "Profile Information",
            "info" => "Update your account's profile information and email address.",
        ],
        "password" => [
            "name" => "Update Password",
            "info" => "Ensure your account is using a long, random password to stay secure.",
        ],
        "two_factor" => [
            "name"        => "Two Factor Authentication",
            "info"        => "Add additional security to your account using two factor authentication.",
            "description" => "When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.",
            "on"          => "You have enabled two factor authentication.",
            "off"         => "You have not enabled two factor authentication.",
            "store"       => "Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.",
            "enabled"     => "Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application.",
            "alert"       => [
                "info" => "or your security, please confirm your password to continue.",
            ],
            "regenerate" => "Regenerate Recovery Codes",
            "recovery"   => "Show Recovery Codes",
        ],
        "session" => [
            "name"        => "Browser Sessions",
            "info"        => "Manage and logout your active sessions on other browsers and devices",
            "description" => "If necessary, you may logout of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.",
            "device"      => "This device",
            "last_active" => "Last active",
            "button"      => "Logout Other Browser Sessions",
        ],
        "delete" => [
            "name"        => "Delete Account",
            "info"        => "Permanently delete your account.",
            "description" => "Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.",
            "button"      => "Delete Account",
            "alert"       => "Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.",
        ],
    ],
    "roles" => [
        "administrator" => "Administrator users can perform any action.",
        "editor"        => "Editor users have the ability to read, create, and update.",
    ],
];
