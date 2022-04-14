<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Sendinblue variables
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the list to use for syncing contacts
    | and the api key to connect to the api server of Sendinblue
    |
    */

    'API_KEY' => env('SENDINBLUE_API_KEY'),
    'LIST_ID' => env('SENDINBLUE_LIST_ID'),
    'SMS_SENDER_NAME' => env('SENDINBLUE_SMS_SENDER_NAME'),
    'SMS_WEBHOOK' => env('SENDINBLUE_SMS_WEBHOOK'),
];
