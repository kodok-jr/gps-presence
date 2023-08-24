<?php

use App\Models\User;

return [
    /** Prefix Page */
    'prefix' => env('LAPATTERN_PREFIX_PAGE', 'administrator'),
    'auth' => [
        'guard' => 'web',
    ],

    /** Templates */
    'components' => [
        'core' => 'components.form'
    ],

    /** User Model */
    'user' => User::class,

    /** Option Cached */
    'cache_option' => true
];
