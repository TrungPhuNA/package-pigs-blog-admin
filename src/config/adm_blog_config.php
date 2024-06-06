<?php
/**
 * Created By PhpStorm
 * User: trungphuna
 * Date: 6/4/24
 * Time: 5:42 PM
 */

return [
    'table' => [
        'menu'     => env('ADM_BLOG_TABLE_MENU', 'menus'),
        'articles' => env('ADM_BLOG_TABLE_ARTICLES', 'articles'),
        'tags'     => env('ADM_BLOG_TABLE_TAGS', 'tags'),
        'articles_tags'     => env('ADM_BLOG_TABLE_ARTICLES_TAGS', 'articles_tags'),
    ],
    'sidebar' => [
        [
            'name' => 'Tổng quan',
            'icon' => 'fas fa-tachometer-alt',
            'route' => 'get.adm_blog.dashboard'
        ],
        [
            'name' => 'Từ khoá',
            'icon' => 'fas fa-tags',
            'route' => 'get.adm_blog.tag.index'
        ],
        [
            'name' => 'Chuyên mục',
            'icon' => 'fas fa-pencil',
            'route' => 'get.adm_blog.menu.index'
        ],
        [
            'name' => 'Bài viết',
            'icon' => 'fas fa-sticky-note',
            'route' => 'get.adm_blog.article.index'
        ],
    ]
];