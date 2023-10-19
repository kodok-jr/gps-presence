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

                /*
                | Account Member
                |--------------------------------------------------------------------------
                */
                [
                    'gate' => 'administrator.management.accounts.student.index',
                    'name' => __('dashboard.sidebar.submenus.name.student'),
                    'description' => __('dashboard.sidebar.submenus.description.student'),
                    'route' => ['administrator.management.accounts.student.index', []],
                    'active_url' => 'administrator/management/accounts/student*',
                    'is_active' => 'management/accounts/student*',
                    'id' => '',
                    'permissions' => [
                        [
                            'gate' => 'administrator.management.accounts.student.create',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.create.student'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.create.student')
                        ],
                        [
                            'gate' => 'administrator.management.accounts.student.update',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.edit.student'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.edit.student')
                        ],
                        [
                            'gate' => 'administrator.management.accounts.student.show',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.show.student'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.show.student')
                        ],
                        [
                            'gate' => 'administrator.management.accounts.student.destroy',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.delete.student'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.delete.student')
                        ]
                    ],
                ],

                /*
                | Master Roles
                |--------------------------------------------------------------------------
                */
                [
                    'gate' => 'administrator.management.access.roles.index',
                    'name' => __('dashboard.sidebar.submenus.name.role-permissions'),
                    'description' => __('dashboard.sidebar.submenus.description.role-permissions'),
                    'route' => ['administrator.management.access.roles.index', []],
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

        /*
        | Presences Monitoring
        |--------------------------------------------------------------------------
        */
        [
            'gate' => 'administrator.monitoring.index',
            'name' => __('dashboard.sidebar.menus.name.monitoring'),
            'description' => __('dashboard.sidebar.submenus.description.monitoring'),
            'route' => ['administrator.monitoring.index', []],
            'active_url' => 'administrator/monitoring*',
            'is_active' => 'management/monitoring*',
            'icon' => 'mdi mdi-desktop-mac-dashboard',
            'id' => '',
            'permissions' => [
                [
                    'gate' => 'administrator.monitoring.create',
                    'title' => __('dashboard.sidebar.submenus.permissions.title.create.monitoring'),
                    'description' => __('dashboard.sidebar.submenus.permissions.description.create.monitoring')
                ],
                // [
                //     'gate' => 'administrator.management.accounts.admin.update',
                //     'title' => __('dashboard.sidebar.submenus.permissions.title.edit.admin'),
                //     'description' => __('dashboard.sidebar.submenus.permissions.description.edit.admin')
                // ],
                // [
                //     'gate' => 'administrator.management.accounts.admin.show',
                //     'title' => __('dashboard.sidebar.submenus.permissions.title.show.admin'),
                //     'description' => __('dashboard.sidebar.submenus.permissions.description.show.admin')
                // ],
                // [
                //     'gate' => 'administrator.management.accounts.admin.destroy',
                //     'title' => __('dashboard.sidebar.submenus.permissions.title.delete.admin'),
                //     'description' => __('dashboard.sidebar.submenus.permissions.description.delete.admin')
                // ]
            ],
            // 'submenus' => []
        ],

        /*
        |--------------------------------------------------------------------------
        | Reports
        |--------------------------------------------------------------------------
        */
        [
            'gate' => 'administrator.reports',
            'name' => __('dashboard.sidebar.menus.name.reports'),
            'description' => __('dashboard.sidebar.menus.description.reports'),
            'route' => null,
            'active_url' => 'administrator/reports*',
            'is_active' => null,
            'icon' => 'mdi mdi-cloud-print-outline',
            'id' => '',
            'permissions' => [],
            'submenus' => [
                /*
                | Presences
                |--------------------------------------------------------------------------
                */
                [
                    'gate' => 'administrator.reports.presence.index',
                    'name' => __('dashboard.sidebar.submenus.name.reports.presence'),
                    'description' => __('dashboard.sidebar.submenus.description.reports.presence'),
                    'route' => ['administrator.reports.presence.index', []],
                    'active_url' => 'administrator/reports/presence*',
                    'is_active' => 'reports/presence*',
                    'id' => '',
                    'permissions' => [
                        [
                            'gate' => 'administrator.reports.presence.create',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.create.reports.presence'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.create.reports.presence')
                        ],
                    ],
                ],

                /*
                | Recap Presences
                |--------------------------------------------------------------------------
                */
                [
                    'gate' => 'administrator.reports.recap-presence.index',
                    'name' => __('dashboard.sidebar.submenus.name.reports.recap-presence'),
                    'description' => __('dashboard.sidebar.submenus.description.reports.recap-presence'),
                    'route' => ['administrator.reports.recap-presence.index', []],
                    'active_url' => 'administrator/reports/recap-presence*',
                    'is_active' => 'reports/recap-presence*',
                    'id' => '',
                    'permissions' => [
                        [
                            'gate' => 'administrator.reports.recap-presence.create',
                            'title' => __('dashboard.sidebar.submenus.permissions.title.create.reports.recap-presence'),
                            'description' => __('dashboard.sidebar.submenus.permissions.description.create.reports.recap-presence')
                        ],
                    ],
                ],
            ],
        ],


        /*
        | Settings
        |--------------------------------------------------------------------------
        */
        [
            'gate' => 'administrator.settings.index',
            'name' => __('dashboard.sidebar.menus.name.settings'),
            'description' => __('dashboard.sidebar.submenus.description.settings'),
            'route' => ['administrator.settings.index', []],
            'active_url' => 'administrator/settings*',
            'is_active' => 'management/settings*',
            'icon' => 'mdi mdi-settings',
            'id' => '',
            'permissions' => [
                [
                    'gate' => 'administrator.settings.update',
                    'title' => __('dashboard.sidebar.submenus.permissions.title.edit.settings'),
                    'description' => __('dashboard.sidebar.submenus.permissions.description.edit.settings')
                ],
            ],
        ],
    ];
