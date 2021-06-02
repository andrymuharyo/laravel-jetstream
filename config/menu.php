<?php

return [
    'topbar' => [
        [
            'label'    => 'menu.dashboard.name',
            'route'    => 'dashboard',
            'children' => [],
        ],
        [
            'label'    => 'menu.navigations.name',
            'route'    => 'backend.navigations',
            'children' => [],
        ],
        [
            'label'    => 'menu.slides.name',
            'route'    => 'backend.slides',
            'children' => [],
        ],
        [
            'label'    => 'menu.contents.name',
            'route'    => 'backend.contents',
        ],
        [
            'label'    => 'menu.posts.name',
            'route'    => 'backend.posts',
        ],
        [
            'label'    => 'menu.contact.name',
            'route'    => '',
            'children' => [
                [
                    'label'    => 'menu.contact.name',
                    'route'    => 'backend.contact',
                ],
                [
                    'label'    => 'menu.inquiries.name',
                    'route'    => 'backend.inquiries',
                ],
                [
                    'label'    => 'menu.newsletters.name',
                    'route'    => 'backend.newsletters',
                ],
            ],
        ],
        [
            'label'    => 'menu.articles.name',
            'route'    => '',
            'children' => [
                [
                    'label'    => 'menu.articles.name',
                    'route'    => 'backend.articles',
                ],
                [
                    'label'    => 'menu.keywords.name',
                    'route'    => 'backend.keywords',
                ],
            ],
        ],
        [
            'label'    => 'menu.medias.name',
            'route'    => '',
            'children' => [
                [
                    'label'    => 'menu.videos.name',
                    'route'    => 'backend.videos.categories',
                ],
                [
                    'label'    => 'menu.photos.name',
                    'route'    => 'backend.photos.categories',
                ],
            ],
        ],
        [
            'label'    => 'menu.links.name',
            'route'    => 'backend.links',
            'children' => [],
        ],
        [
            'label'    => 'menu.legals.name',
            'route'    => 'backend.legals',
            'children' => [],
        ],
    ],
    'sidebar' => [
        [
            'label'    => 'menu.metas.name',
            'route'    => 'backend.metas',
            'children' => [],
        ],
        [
            'label'    => 'menu.analytics.name',
            'route'    => 'backend.analytics',
            'children' => [],
        ],
    ]
];
