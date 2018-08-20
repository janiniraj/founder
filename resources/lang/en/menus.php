<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Access',

            'roles' => [
                'all'        => 'All Roles',
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',
                'main'       => 'Roles',
            ],

            'users' => [
                'all'             => 'All Users',
                'change-password' => 'Change Password',
                'create'          => 'Create User',
                'deactivated'     => 'Deactivated Users',
                'deleted'         => 'Deleted Users',
                'edit'            => 'Edit User',
                'main'            => 'Users',
                'view'            => 'View User',
            ],
        ],

        'pages' => [
            'management'      => 'Page Management',
            'all'             => 'All Pages',
            'create'          => 'Create Page',
            'edit'            => 'Edit Page',
            'main'            => 'Pages',
            'view'            => 'View Page',
        ],

        'blogs' => [
            'management'      => 'Blog Management',
            'all'             => 'All Blogs',
            'create'          => 'Create Blog',
            'edit'            => 'Edit Blog',
            'main'            => 'Blogs',
            'view'            => 'View Blog',
        ],

        'awards' => [
            'management'      => 'Award Management',
            'all'             => 'All Awards',
            'create'          => 'Create Award',
            'edit'            => 'Edit Award',
            'main'            => 'Awards',
            'view'            => 'View Award',
        ],

        'quotes' => [
            'management'      => 'Quote Management',
            'all'             => 'All Quotes',
            'create'          => 'Create Quote',
            'edit'            => 'Edit Quote',
            'main'            => 'Quotes',
            'view'            => 'View Quote',
        ],

        'speeches' => [
            'management'      => 'Speech Management',
            'all'             => 'All Speeches',
            'create'          => 'Create Speech',
            'edit'            => 'Edit Speech',
            'main'            => 'Speeches',
            'view'            => 'View Speech',
        ],

        'log-viewer' => [
            'main'      => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs'      => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general'   => 'General',
            'system'    => 'System',
        ],
    ],

    'language-picker' => [
        'language' => 'Language',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar'    => 'Arabic',
            'zh'    => 'Chinese Simplified',
            'zh-TW' => 'Chinese Traditional',
            'da'    => 'Danish',
            'de'    => 'German',
            'el'    => 'Greek',
            'en'    => 'English',
            'es'    => 'Spanish',
            'fa'    => 'Persian',
            'fr'    => 'French',
            'he'    => 'Hebrew',
            'id'    => 'Indonesian',
            'it'    => 'Italian',
            'ja'    => 'Japanese',
            'nl'    => 'Dutch',
            'no'    => 'Norwegian',
            'pt_BR' => 'Brazilian Portuguese',
            'ru'    => 'Russian',
            'sv'    => 'Swedish',
            'th'    => 'Thai',
            'tr'    => 'Turkish',
        ],
    ],
];
