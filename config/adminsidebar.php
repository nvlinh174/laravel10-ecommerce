<?php
return [
    [
        'name' => 'Dashboard',
        'route' => 'dashboard.index'
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
