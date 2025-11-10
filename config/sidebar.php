<?php
/**
 * Menu yang tertampil di sidebar sebelah kiri halaman admin/operator
 */

return [
    /*
    |--------------------------------------------------------------------------
    | MENU UNTUK ADMIN
    |--------------------------------------------------------------------------
    */
    (object) [
        'title' => 'Input Label',
        'route' => 'web.dashboard.index',
        'icon' => 'fa fa-tags',
        'identifier' => (object) [
            'route' => 'web.dashboard.index',
        ],
        'tree' => null,
        'query' => null,
        'allowed' => 'admin',
    ],
    (object) [
        'title' => 'Data Label',
        'route' => 'web.label.index',
        'icon' => 'fa fa-table',
        'identifier' => (object) [
            'route' => 'web.label.index',
        ],
        'tree' => null,
        'query' => null,
        'allowed' => 'admin',
    ],
    (object) [
        'title' => 'Operator',
        'route' => 'web.user.index',
        'icon' => 'fa fa-users',
        'identifier' => (object) [
            'route' => 'web.user.index',
        ],
        'tree' => null,
        'query' => null,
        'allowed' => 'admin',
    ],

    /*
    |--------------------------------------------------------------------------
    | MENU UNTUK OPERATOR
    |--------------------------------------------------------------------------
    */
    (object) [
        'title' => 'Input Label',
        'route' => 'web.dashboard.index',
        'icon' => 'fa fa-tags',
        'identifier' => (object) [
            'route' => 'web.dashboard.index',
        ],
        'tree' => null,
        'query' => null,
        'allowed' => 'operator',
    ],
    (object) [
        'title' => 'Data Label',
        'route' => 'web.label.index',
        'icon' => 'fa fa-table',
        'identifier' => (object) [
            'route' => 'web.label.index',
        ],
        'tree' => null,
        'query' => null,
        'allowed' => 'operator',
    ],
];
