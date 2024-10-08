<?php

return [
    'menu' =>[

        'dashboard' => [
            'icon' => 'fa fa-dashboard',
            'fa_name' => 'داشبرد',
            'submenu' => [
                'dashboard' => [ 'fa_name' => 'داشبرد', 'route-name' => '', 'route-url' => 'admin' ],
            ]
        ],
        'cases' => [
            'icon' => 'fa fa-list',
            'fa_name' => 'کارپوشه',
            'submenu' => [
                'new-case' => [ 'fa_name' => 'فرایند جدید', 'route-name' => 'MkhodrooProcessMaker.forms.start', 'route-url' => '' ],
                'inbox' => [ 'fa_name' => 'انجام نشده ها', 'route-name' => 'MkhodrooProcessMaker.forms.todo', 'route-url' => '' ],
                'done' => [ 'fa_name' => 'انجام شده ها', 'route-name' => 'MkhodrooProcessMaker.forms.done', 'route-url' => '' ],
                'draft' => [ 'fa_name' => 'پیش نویس', 'route-name' => 'MkhodrooProcessMaker.forms.draft', 'route-url' => '' ]
            ]
        ],
        'cases-report' => [
            'icon' => 'fa fa-list',
            'fa_name' => 'گزارشات کارپوشه',
            'submenu' => [
                'all' => [ 'fa_name' => 'همه', 'route-name' => 'pmAdmin.form.allCasesForm', 'route-url' => '' ],
                'filter-by-last-status' => [ 'fa_name' => 'دسته بندی', 'route-name' => 'pmAdmin.form.casesByLastStatusView', 'route-url' => '' ],
                'fin-report' => [ 'fa_name' => 'مالی', 'route-name' => 'pmAdmin.form.finListView', 'route-url' => '' ],
            ]
        ],
        'users' => [
            'icon' => 'fa fa-user',
            'fa_name' => 'کاربران',
            'submenu' => [
                'dashboard' => [ 'fa_name' => 'همه', 'route-name' => '', 'route-url' => 'user/all' ],
                'role' => [ 'fa_name' => 'نقش ها', 'route-name' => 'role.listForm', 'route-url' => '' ],
                'method' => [ 'fa_name' => 'متد ها', 'route-name' => 'method.list', 'route-url' => '' ],
            ]
        ],
        'tickets' => [
            'icon' => 'fa fa-ticket',
            'fa_name' => 'تیکت پشتیبانی',
            'submenu' => [
                'create' => [ 'fa_name' => 'ایجاد', 'route-name' => 'ATRoutes.index', 'route-url' => '' ],
                'show' => [ 'fa_name' => 'مشاهده', 'route-name' => 'ATRoutes.show.listForm', 'route-url' => '' ],
            ]
        ],

    ]
];
