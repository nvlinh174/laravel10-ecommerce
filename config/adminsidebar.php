<?php
return [
    [
        'name' => 'Dashboard',
        'route' => 'dashboard.index'
    ],
    [
        'name' => 'Quản lý trang',
        'route' => 'pages.index'
    ],
    [
        'name' => 'Quản lý danh mục',
        'route' => 'categories.index'
    ],
    [
        'name' => 'Tài khoản',
        'route' => false,
        'child' => [
            [
                'name' => 'Thông tin cá nhân',
                'route' => 'auth.profile'
            ],
            [
                'name' => 'Thay đổi mật khẩu',
                'route' => 'auth.updatePassword'
            ],
        ]
    ],
    [
        'name' => 'Đăng xuất',
        'route' => 'auth.logout'
    ],
];
