<?php

return [
    [
        'title' => 'Dashboard',
        'icon' => 'bi bi-speedometer',
        'route' => 'admin.dashboard',
    ],
    [
        'title' => 'Quản lý sản phẩm',
        'icon' => 'bi bi-box-seam',
        'submenu' => [
            [
                'title' => 'Danh mục sản phẩm',
                'route' => 'admin.categories.index',
                'icon' => 'bi bi-folder2-open',
            ],
            [
                'title' => 'Sản phẩm',
                'route' => 'admin.products.index',
                'icon' => 'bi bi-bag',
            ],
        ],
    ],
/*    [
        'title' => 'Quản lý dự án',
        'icon' => 'bi bi-collection',
        'submenu' => [
            [
                'title' => 'Danh mục dự án',
                'route' => 'admin.projects.index',
                'icon' => 'bi bi-clipboard',
            ],
            [
                'title' => 'Dự án',
                'route' => 'admin.products.index',
                'icon' => 'bi bi-clipboard-minus',
            ],
        ],
    ],
*/    [
        'title' => 'Quản lý dịch vụ',
        'icon' => 'bi bi-journal-bookmark-fill',
        'submenu' => [
            [
                'title' => 'Danh mục dịch vụ',
                'route' => 'admin.service_categories.index',
                'icon' => 'bi bi-journal',
            ],
            [
                'title' => 'Dự án',
                'route' => 'admin.services.index',
                'icon' => 'bi bi-journal-medical',
            ],
        ],
    ],
    [
        'title' => 'Quản lý bài viết',
        'icon' => 'bi bi-file-text',
        'submenu' => [
            [
                'title' => 'Danh mục bài viết',
                'route' => 'admin.post-categories.index',
                'icon' => 'bi bi-folder2',
            ],
            [
                'title' => 'Bài viết',
                'route' => 'admin.posts.index',
                'icon' => 'bi bi-file-earmark',
            ],
        ],
    ],
    [
        'title' => 'Slide',
        'icon' => 'bi bi-images',
        'route' => 'admin.slides.index',
    ],
    [
        'title' => 'Quản lý giới thiệu',
        'icon' => 'bi bi-file-earmark-person',
        'route' => 'admin.intros.index',
    ],
    [
        'title' => 'Liên hệ',
        'icon' => 'bi bi-mailbox-flag',
        'route' => 'admin.contacts.index',
    ],
    [
        'title' => 'Cấu hình',
        'icon' => 'bi bi-gear',
        'route' => 'admin.settings.index',
    ],
];
