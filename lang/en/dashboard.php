<?php

return [
     /**==============================================================
     * SIDEBAR
     ================================================================*/
    'sidebar' => [
        'menus' => [
            'name' => [
                'user-management' => 'User Management',
                'profile' => 'My Profile'
            ],
            'description' => [
                'user-management' => 'Menu for account management list',
                'profile' => 'Menu for update user profile logged in'
            ]
        ],

        'submenus' => [
            'name' => [
                'user' => 'User Admin',
                'role-permissions' => 'Role & Permissions',
                'profile' => 'Update Profile'
            ],
            'description' => [
                'user' => 'Menu for list of admins registered on the application',
                'role-permissions' => 'Menu for master roles list',
                'profile' => 'Access permission to update profile'
            ],
            'permissions' => [
               'title' => [
                    'create' => [
                        'admin' => 'Create Admin',
                        'role' => 'Create Role'
                    ],
                    'edit' => [
                        'admin' => 'Update Admin',
                        'role' => 'Update Role'
                    ],
                    'show' => [
                        'admin' => 'Detail Admin',
                        'role' => 'Detail Role'
                    ],
                    'delete' => [
                        'admin' => 'Delete Admin',
                        'role' => 'Delete Role'
                    ],

                    'permission' => [
                        'show' => 'Detail Permissions',
                        'assign' => 'Assign Permissions'
                    ]
               ],

                'description' => [
                    'create' => [
                        'admin' => 'Access permission to create admin account',
                        'role' => 'Access permission to create new role',
                    ],
                    'edit' => [
                        'admin' => 'Access permission to update admin account',
                        'role' => 'Access permission to update role',
                    ],
                    'show' => [
                        'admin' => 'Access permission to view details admin account',
                        'role' => 'Access permission to view details role',
                    ],
                    'delete' => [
                        'admin' => 'Access permission to delete admin account',
                        'role' => 'Access permission to delete role',
                    ],

                    'permission' => [
                        'show' => 'Access permission to view detail all permissions',
                        'assign' => 'Access permission to assign all permissions'
                    ]
                ]
            ]
        ]
    ],

    /**==============================================================
     * Global
     ================================================================*/
    'content' => [
        'title' => [
            'user' => 'List of User',
            'role' => 'List of Role',

            'create' => [
                'user' => 'Create New User',
                'role' => 'Create New Role'
            ],
            'edit' => [
                'user' => 'Update User',
                'role' => 'Update Role'
            ],
            'delete' => [
                'header' => 'Confirm Delete',
                'body' => 'Are you sure?',
                'text' => 'You won\'t be able to revert this!',
                'buttons' => [
                    'yes' => 'Yes',
                    'no' => 'No'
                ]
            ]
        ],

        'buttons' => [
            'create' => 'Add New',
            'submit' => 'Submit',
            'cancel' => 'Cancel'
        ],

        'required' => 'Required Information',

        'profile' => [
            'title' => 'Update Profile',
            'card' => [
                'left' => [
                    'contact-information' => 'Contact Information',
                    'social-profile' => 'Social Profile'
                ],
                'right' => [
                    'accordion-title' => [
                        'setting' => 'Settings',
                        'time-line' => 'Timeline'
                    ]
                ]
            ],
        ],
    ],

    'flash' => [
        'success' => [
            'title' => 'Well done!',
            'user' => 'User has been created successfully!',
            'role' => 'Role has been created successfully!',
            'avatar' => 'Avatar successfully updated!'
        ],
        'edit' => [
            'user' => 'User has been updated successfully!',
            'role' => 'Role has been updated successfully!'
        ],
        'delete' => [
            'user' => 'User has been deleted successfully!',
            'role' => [
                'cannot' => 'This role can\'t be deleted!',
                'can' => 'Role has been deleted successfully!'
            ],
        ]
    ]
];
