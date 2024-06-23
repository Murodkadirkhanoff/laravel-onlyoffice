<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Hash algorithm
    |--------------------------------------------------------------------------
    */

    'algorithm' => 'HS256',


    /*
    |--------------------------------------------------------------------------
    | Secret Key From OnlyOffice
    |--------------------------------------------------------------------------
    |
    | Starting from OnlyOffice Docs v.7.2, JWT is enabled by default and the
    | secret key is generated automatically. You can always change the parameters
    | to the ones you require.
    |
    */

    'secret' => env('ONLYOFFICE_SECRET'),

];
