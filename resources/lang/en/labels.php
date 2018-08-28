<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all'     => 'All',
        'yes'     => 'Yes',
        'no'      => 'No',
        'copyright' => 'Copyright',
        'custom'  => 'Custom',
        'actions' => 'Actions',
        'active'  => 'Active',
        'buttons' => [
            'save'   => 'Save',
            'update' => 'Update',
        ],
        'hide'              => 'Hide',
        'inactive'          => 'Inactive',
        'none'              => 'None',
        'show'              => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions'     => 'Permissions',
                    'role'            => 'Role',
                    'sort'            => 'Sort',
                    'total'           => 'role total|roles total',
                ],
            ],

            'users' => [
                'active'              => 'Active Users',
                'all_permissions'     => 'All Permissions',
                'change_password'     => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create'              => 'Create User',
                'deactivated'         => 'Deactivated Users',
                'deleted'             => 'Deleted Users',
                'edit'                => 'Edit User',
                'management'          => 'User Management',
                'no_permissions'      => 'No Permissions',
                'no_roles'            => 'No Roles to set.',
                'permissions'         => 'Permissions',

                'table' => [
                    'confirmed'      => 'Confirmed',
                    'created'        => 'Created',
                    'email'          => 'E-mail',
                    'id'             => 'ID',
                    'last_updated'   => 'Last Updated',
                    'name'           => 'Name',
                    'first_name'     => 'First Name',
                    'last_name'      => 'Last Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted'     => 'No Deleted Users',
                    'other_permissions' => 'Other Permissions',
                    'permissions' => 'Permissions',
                    'roles'          => 'Roles',
                    'social' => 'Social',
                    'total'          => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Confirmed',
                            'created_at'   => 'Created At',
                            'deleted_at'   => 'Deleted At',
                            'email'        => 'E-mail',
                            'last_updated' => 'Last Updated',
                            'name'         => 'Name',
                            'first_name'   => 'First Name',
                            'last_name'    => 'Last Name',
                            'status'       => 'Status',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],
        'pages' => [
            'create'     => 'Create Page',
            'edit'       => 'Edit Page',
            'management' => 'Page Management',
            'title' => 'Page',

            'table' => [
                'title'          => 'Page',
                'slug'           => 'Slug',
                'content'        => 'Content',
                'createdat'      => 'Created At',
                'all'            => 'All',
                'number_of_pages' => 'Number of Pages',
                'sort'            => 'Sort',
                'total'           => 'pages total|pages total'
            ],
        ],

        'blogs' => [
            'create'     => 'Create Blog',
            'edit'       => 'Edit Blog',
            'management' => 'Blog Management',
            'title' => 'Blog',

            'table' => [
                'title'          => 'Blog',
                'slug'           => 'Slug',
                'content'        => 'Content',
                'createdat'      => 'Created At',
                'all'            => 'All',
                'number_of_blogs' => 'Number of Blogs',
                'sort'            => 'Sort',
                'total'           => 'blogs total|blogs total'
            ],
        ],

        'awards' => [
            'create'     => 'Create Award',
            'edit'       => 'Edit Award',
            'management' => 'Award Management',
            'title' => 'Award',

            'table' => [
                'title'          => 'Award',
                'year'           => 'Year',
                'createdat'      => 'Created At',
                'all'            => 'All',
                'number_of_blogs' => 'Number of Awards',
                'sort'            => 'Sort',
                'total'           => 'award total|awards total'
            ],
        ],

        'quotes' => [
            'create'     => 'Create Quote',
            'edit'       => 'Edit Quote',
            'management' => 'Quote Management',
            'title' => 'Quote',

            'table' => [
                'title'          => 'Title',
                'slug'           => 'Slug',
                'content'        => 'Quote',
                'createdat'      => 'Created At',
                'all'            => 'All',
                'number_of_blogs' => 'Number of Quotes',
                'sort'            => 'Sort',
                'total'           => 'quotes total|quotes total'
            ],
        ],

        'speeches' => [
            'create'     => 'Create Speech',
            'edit'       => 'Edit Speech',
            'management' => 'Speech Management',
            'title' => 'Speech',

            'table' => [
                'title'          => 'Speech',
                'slug'           => 'Slug',
                'content'        => 'Content',
                'createdat'      => 'Created At',
                'all'            => 'All',
                'number_of_blogs' => 'Number of Speeches',
                'sort'            => 'Sort',
                'total'           => 'speeches total|speeches total'
            ],
        ],

        'news' => [
            'create'     => 'Create News',
            'edit'       => 'Edit News',
            'management' => 'News Management',
            'title' => 'News',

            'table' => [
                'title'          => 'News',
                'slug'           => 'Slug',
                'content'        => 'Content',
                'createdat'      => 'Created At',
                'all'            => 'All',
                'number_of_news' => 'Number of News',
                'sort'            => 'Sort',
                'total'           => 'News total|news total'
            ],
        ],

        'publications' => [
            'create'     => 'Create Publication',
            'edit'       => 'Edit Publication',
            'management' => 'Publication Management',
            'title' => 'Publication',

            'table' => [
                'title'          => 'Publication',
                'slug'           => 'Slug',
                'content'        => 'Content',
                'createdat'      => 'Created At',
                'all'            => 'All',
                'number_of_news' => 'Number of Publication',
                'sort'            => 'Sort',
                'total'           => 'Publication total|publication total'
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'Login',
            'login_button'       => 'Login',
            'login_with'         => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button'    => 'Register',
            'remember_me'        => 'Remember Me',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'expired_password_box_title' => 'Your password has expired.',
            'forgot_password'                 => 'Forgot Your Password?',
            'reset_password_box_title'        => 'Reset Password',
            'reset_password_button'           => 'Reset Password',
            'update_password_button'           => 'Update Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'Created At',
                'edit_information'   => 'Edit Information',
                'email'              => 'E-mail',
                'last_updated'       => 'Last Updated',
                'name'               => 'Name',
                'first_name'         => 'First Name',
                'last_name'          => 'Last Name',
                'update_information' => 'Update Information',
            ],
        ],

    ],
];
