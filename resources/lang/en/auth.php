<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application"s requirements.
    |
    */
    "inactive"   => "User inactive! please confirm with administrator",
    "failed"     => "These credentials do not match our records.",
    "password"   => "The provided password is incorrect.",
    "throttle"   => "Too many login attempts. Please try again in :seconds seconds.",
    "registered" => "Already registered?",
    "two_factor" => [
        "info_authenticator" => "Please confirm access to your account by entering the authentication code provided by your authenticator application.",
        "info_emergency"     => "Please confirm access to your account by entering one of your emergency recovery codes.",
        "recovery"           => "Use a recovery code",
        "authentication"     => "Use an authentication code",
    ],
    "verify"     => [
        "info"   => "Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.",
        "link"   => "A new verification link has been sent to the email address you provided during registration.",
        "button" => "Resend Verification Email",
    ],
    "forgot"   => [
        "info"   => "Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.",
        "button" => "Email Password Reset Link",
    ],

];
