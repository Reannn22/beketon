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
    $viteProcess->disableOutput(); // Disable TTY requirement
    $viteProcess->start();
    
    // Start Laravel server with port 8080
    $this->call('serve', [
        '--host' => '0.0.0.0',
        '--port' => '8080'
    ]);
    
    // Clean up Vite process when Laravel server stops
    if ($viteProcess->isRunning()) {
        $viteProcess->stop();
    }
})->purpose('Start both Laravel and Vite development servers');
