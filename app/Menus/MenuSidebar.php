<?php

    return [
        /*
        |--------------------------------------------------------------------------
        | Users Management
        |--------------------------------------------------------------------------
        */
        [
            'gate' => 'administrator.management',
            'name' => __('dashboard.sidebar.menus.name.user-management'),
            'description' => __('dashboard.sidebar.menus.description.user-management'),
            'route' => null,
            'active_url' => 'administrator/management*',
            'is_active' => null,
            'icon' => 'mdi mdi-shield-key-outline',
            'id' => '',
            'permissions' => [],
            'submenus' => [
                /*
                | Account Admin
                |--------------------------------------------------------------------------
                */
                [
                    'gate' => 'administrator.management.accounts.admin.index',
                    'name' => __('dashboard.sidebar.submenus.name.user'),
                    'description' => __('dashboard.sidebar.submenus.description.user'),
                    'route' => ['administrator.management.accounts.admin.index', []],
                    'active_url' => 'administrator/management/accounts/admin*',
                    'is_active' => 'management/accounts/admin*',
                    'id' => '',
                    'permissions' => [
                        [
                            'gate' => 'administrator.management.accounts.admin.create',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.create.admin'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.create.admin')
                        ],
                        [
                            'gate' => 'administrator.management.accounts.admin.update',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.edit.admin'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.edit.admin')
                        ],
                        [
                            'gate' => 'administrator.management.accounts.admin.show',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.show.admin'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.show.admin')
                        ],
                        [
                            'gate' => 'administrator.management.accounts.admin.destroy',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.delete.admin'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.delete.admin')
                        ]
                    ],
                ],
            ],
        ],
    ];
