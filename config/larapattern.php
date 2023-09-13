<?php

use App\Models\Admin;
use App\Models\User;

return [
    /** Prefix Page */
    'prefix' => env('LAPATTERN_PREFIX_PAGE', 'administrator'),
    'auth' => [
        // 'guard' => 'web',
        'guard' => 'admin',
    ],

    /** Templates */
    'components' => [
        'core' => 'components.form'
    ],

    /** User Model */
    'user' => Admin::class,

    /** Option Cached */
    'cache_option' => true
];
