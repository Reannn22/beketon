<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('serve:dev', function () {
    $this->info('Starting development servers...');

    // Start Vite development server
    $viteProcess = new Process(['npm', 'run', 'dev']);
    $viteProcess->setOptions(['create_new_console' => true]);
    $viteProcess->start();

    // Start Laravel server
    $laravelProcess = new Process(['php', 'artisan', 'serve', '--host=localhost', '--port=8000']);
    $laravelProcess->setOptions(['create_new_console' => true]);
    $laravelProcess->run(function ($type, $buffer) {
        $this->output->write($buffer);
    });

    // Clean up processes
    if ($viteProcess->isRunning()) {
        $viteProcess->stop();
    }
})->purpose('Start both Laravel and Vite development servers');
