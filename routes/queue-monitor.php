<?php

use Illuminate\Support\Facades\Route;

Route::get('', romanzipp\QueueMonitor\Controllers\ShowQueueMonitorController::class)->name('queue-monitor::index');

Route::delete('monitors/{monitor}', romanzipp\QueueMonitor\Controllers\DeleteMonitorController::class)->name('queue-monitor::destroy');

// Route::patch('monitors/retry/{monitor}', romanzipp\QueueMonitor\Controllers\RetryMonitorController::class)->name('queue-monitor::retry');

if (config('queue-monitor.ui.allow_purge')) {
    Route::delete('purge', romanzipp\QueueMonitor\Controllers\PurgeMonitorsController::class)->name('queue-monitor::purge');
}

if (config('queue-monitor.ui.allow_retry')) {
    Route::patch('monitors/retry/{monitor}', romanzipp\QueueMonitor\Controllers\RetryMonitorController::class)->name('queue-monitor::retry');
}
