<?php

return [
    'fields' => [
        'full_name' => 'text:20|nullable',
        'email' => 'text:20|unique',
        'detail' => 'longText'
    ],
    'model' => 'App\Neputer\Models',
    'repository' => 'App\Http\Repositories',
    'service' => 'App\Http\ServiceApp\User',
    'controller' => 'App\Http\Controllers',
    'request' => [
        'App\Http\RequestApp\Admin\StoreRequest' => [
            'rules' => [
                'full_name' => 'required',
                'email' => 'required'
            ],
            'messages' => [
            ]
        ],
        'App\Http\RequestApp\Admin\UpdateRequest' => [
            'rules' => [
                'full_name' => 'required',
                'email' => 'required'
            ]
        ]
    ],
];
