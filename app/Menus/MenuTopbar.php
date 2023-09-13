<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Users Profile
    |--------------------------------------------------------------------------
    */
    [
        'gate' => 'administrator.profile.index',
        'name' => __('dashboard.sidebar.menus.name.profile'),
        'description' => __('dashboard.sidebar.menus.description.profile'),
        'route' => ['administrator.profile.index', []],
        'active_url' => 'administrator/profile*',
        'is_active' => null,
        'icon' => 'mdi mdi-account-convert',
        'id' => '',
        'permissions' => [
            [
                'gate' => 'administrator.profile.update',
                'title' => __('dashboard.sidebar.submenus.name.profile'),
                'description' => __('dashboard.sidebar.submenus.description.profile')
            ],
        ],
        'submenus' => null,
    ],
];
