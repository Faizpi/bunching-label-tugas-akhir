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
        'title' => 'Input Label', // Menu input/cetak label
        'route' => 'web.dashboard.index',
        'icon' => 'fa fa-pencil',
        'identifier' => (object) [
            'route' => 'web.dashboard.index',
        ],
        'tree' => null,
        'query' => null,
        'allowed' => 'admin',
    ],
    (object) [
        'title' => 'Data Label', // Menu tabel label
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
        'title' => 'Operator', // Menu manajemen user/operator
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
        'title' => 'Input Label', // Menu input label
        'route' => 'web.dashboard.index',
        'icon' => 'fa fa-pencil',
        'identifier' => (object) [
            'route' => 'web.dashboard.index',
        ],
        'tree' => null,
        'query' => null,
        'allowed' => 'operator',
    ],
    (object) [
        'title' => 'Data Label', // Menu tabel label
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
