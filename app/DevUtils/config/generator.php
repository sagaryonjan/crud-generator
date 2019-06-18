<?php

return [
    'model' => [
        'namespace' => 'App\Models',
        'path' => app_path('Models'),
        'suffix' => false
    ],
    'controller' => [
        'namespace' => 'App\Http\Controllers',
        'path' => app_path('Http/Controllers'),
        'suffix' => true
    ],
    'route' => [
        'path' => base_path('routes'),
        'file' => 'web'
    ],
    'migration' => [
        'path' => database_path('migrations')
    ],
    'view' => [
        'path' => resource_path('views/admin')
    ],
    'pagination_limit' => 10
    // 'request' => [
    //     'Http/Requests/Admin/StoreRequest' => [
    //         'rules' => [
    //             'full_name' => 'required',
    //             'email' => 'required'
    //         ],
    //         'messages' => [
    //         ]
    //     ],
    //     'Http/Requests/Admin/UpdateRequest' => [
    //         'rules' => [
    //             'full_name' => 'required',
    //             'email' => 'required'
    //         ]
    //     ]
    // ],
    // 'migration_target_path' => base_path('database/migrations'),
];
