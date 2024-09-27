<?php

return [
    'menu' =>[

        'dashboard' => [
            'fa_name' => 'Dashboard',
            'submenu' => [
                'dashboard' => [ 'fa_name' => 'Dashboard', 'route-name' => '', 'route-url' => 'admin' ],
            ]
        ],
        'cases' => [
            'fa_name' => 'کارپوشه',
            'submenu' => [
                'new-case' => [ 'fa_name' => 'فرایند جدید', 'route-name' => 'MkhodrooProcessMaker.forms.start', 'route-url' => '' ],
                'inbox' => [ 'fa_name' => 'انجام نشده ها', 'route-name' => 'MkhodrooProcessMaker.forms.todo', 'route-url' => '' ],
                'done' => [ 'fa_name' => 'انجام شده ها', 'route-name' => 'MkhodrooProcessMaker.forms.done', 'route-url' => '' ],
                'draft' => [ 'fa_name' => 'پیش نویس', 'route-name' => 'MkhodrooProcessMaker.forms.draft', 'route-url' => '' ]
            ]
        ],
        'ngv-control' => [
            'fa_name' => 'Ngv Control',
            'submenu' => [
                'create' => [ 'fa_name' => 'New', 'route-name' => 'ngvControl.registerForm', 'route-url' => '' ],
                'list' => [ 'fa_name' => 'My List', 'route-name' => 'ngvControl.list.myListView', 'route-url' => '' ],
            ]
        ],
        'users' => [
            'fa_name' => 'Users',
            'submenu' => [
                'dashboard' => [ 'fa_name' => 'All', 'route-name' => '', 'route-url' => 'admin/user/all' ],
                'role' => [ 'fa_name' => 'Roles', 'route-name' => 'role.listForm', 'route-url' => '' ],
                'method' => [ 'fa_name' => 'Methods', 'route-name' => 'method.list', 'route-url' => '' ],
            ]
        ],
        'tickets' => [
            'fa_name' => 'Tickets',
            'submenu' => [
                'create' => [ 'fa_name' => 'Create', 'route-name' => 'ATRoutes.index', 'route-url' => '' ],
                'show' => [ 'fa_name' => 'Show', 'route-name' => 'ATRoutes.show.listForm', 'route-url' => '' ],
            ]
        ],

    ]
];
