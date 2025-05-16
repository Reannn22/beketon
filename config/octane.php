<?php

return [
    'server' => env('OCTANE_SERVER', 'swoole'),
    'https' => env('OCTANE_HTTPS', false),
    'workers' => env('OCTANE_WORKERS', 1),
    'watch' => [
        'webpack.mix.js',
        'webpack.config.js',
        'package.json',
        'composer.json',
        'app',
        'bootstrap',
        'config',
        'database',
        'public/**/*.php',
        'resources/**/*.php',
        'routes',
        'tests',
    ],
    'listeners' => [
        // Remove or comment out this section
        // 'Illuminate\Database\Events\QueryExecuted' => [
        //     'App\Listeners\QueryListener',
        // ],
    ],
];
