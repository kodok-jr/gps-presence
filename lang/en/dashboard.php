<?php

return [
     /**==============================================================
     * SIDEBAR
     ================================================================*/
    'sidebar' => [
        'menus' => [
            'name' => [
                'user-management' => 'User Management',
                'profile' => 'My Profile',
                'monitoring' => 'Monitoring',
                'reports' => 'Reports',
                'settings' => 'Settings',
                'approvals' => 'Persetujuan'
            ],
            'description' => [
                'user-management' => 'Menu for account management list',
                'profile' => 'Menu for update user profile logged in',
                'monitoring' => 'Menu for presences monitoring',
                'reports' => 'Menu for print any reporting',
                'approvals' => 'Menu for approval absences'
            ]
        ],

        'submenus' => [
            'name' => [
                'user' => 'Admin',
                'student' => 'Member',
                'role-permissions' => 'Role & Permissions',
                'profile' => 'Update Profile',
                'reports' => [
                    'presence' => 'Presences',
                    'recap-presence' => 'Recap Presences'
                ]
            ],
            'description' => [
                'user' => 'Menu for list of admins registered on the application',
                'student' => 'Menu for list of students registered on the application',
                'role-permissions' => 'Menu for master roles list',
                'profile' => 'Access permission to update profile'
            ],
            'permissions' => [
               'title' => [
                    'create' => [
                        'admin' => 'Create Admin',
                        'student' => 'Create Member',
                        'role' => 'Create Role',
                        'monitoring' => 'Create Presences Monitoring'
                    ],
                    'edit' => [
                        'admin' => 'Update Admin',
                        'student' => 'Update Member',
                        'role' => 'Update Role',
                        'approvals' => 'Approval Absences'
                    ],
                    'show' => [
                        'admin' => 'Detail Admin',
                        'student' => 'Detail Member',
                        'role' => 'Detail Role'
                    ],
                    'delete' => [
                        'admin' => 'Delete Admin',
                        'student' => 'Delete Member',
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
                        'student' => 'Access permission to create student account',
                        'role' => 'Access permission to create new role',
                        'monitoring' => 'Access permission to create presences monitoring',
                    ],
                    'edit' => [
                        'admin' => 'Access permission to update admin account',
                        'student' => 'Access permission to update student account',
                        'role' => 'Access permission to update role',
                        'approvals' => 'Access permission to approval absences'
                    ],
                    'show' => [
                        'admin' => 'Access permission to view details admin account',
                        'student' => 'Access permission to view details student account',
                        'role' => 'Access permission to view details role',
                    ],
                    'delete' => [
                        'admin' => 'Access permission to delete admin account',
                        'student' => 'Access permission to delete student account',
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
            'student' => 'List of Member',
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
