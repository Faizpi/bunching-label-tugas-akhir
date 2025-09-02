<?php
/**
 * Menu yang tertampil di sidebar sebelah kiri halaman admin
 */

return [
    (object)[
        'title' => 'Label', //Text yang di tampilkan sebagai menu
        'route' => 'web.dashboard.index', //Route name untuk menu
        'icon' => 'fa fa-dashboard', //Icon untuk menu
        'identifier' => (object)[
            'segment' => 1, //URL segment sebagai identifikasi
            'path' => 'dashboard' //Text segment sebagai identifikasi
        ],
        'tree' => null,
        'query' => null, //Apakah menu punya dropdown
        'allowed' => 'admin', //Role apa yg dapat mengakses, 'all' semua bisa
    ],
    (object)[
        'title' => 'Operator',
        'route' => 'web.user.index',
        'icon' => 'fa fa-users',
        'identifier' => (object)[
            'segment' => 1,
            'path' => 'member'
        ],
        'tree' => null,
        'query' => null,
        'allowed' => 'admin',
    ],
];