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
                    'gate' => '',
                    'name' => __('dashboard.sidebar.submenus.name.user'),
                    'description' => __('dashboard.sidebar.submenus.description.user'),
                    'route' => ['', []],
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

                /*
                | Master Roles
                |--------------------------------------------------------------------------
                */
               [
                    'gate' => '',
                    'name' => __('dashboard.sidebar.submenus.name.role-permissions'),
                    'description' => __('dashboard.sidebar.submenus.description.role-permissions'),
                    'route' => ['', []],
                    'active_url' => 'administrator/management/access/roles*',
                    'is_active' => 'management/access/roles*',
                    'id' => '',
                    'permissions' => [
                        [
                            'gate' => 'administrator.management.access.roles.create',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.create.role'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.create.role')
                        ],
                        [
                            'gate' => 'administrator.management.access.roles.update',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.edit.role'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.edit.role')
                        ],
                        [
                            'gate' => 'administrator.management.access.roles.show',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.show.role'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.show.role')
                        ],
                        [
                            'gate' => 'administrator.management.access.roles.destroy',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.delete.role'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.delete.role')
                        ],
                        /* Permissions
                        |--------------------------------------------------------------------------
                        */
                        [
                            'gate' => 'administrator.management.access.permission.show',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.permission.show'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.permission.show')
                        ],
                        [
                            'gate' => 'administrator.management.access.permission.assign',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.permission.assign'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.permission.assign')
                        ],
                    ],
                ],
            ],
        ],
    ];
