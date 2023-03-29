<?php

use Illuminate\Support\Facades\Route;

Route::get('', \romanzipp\QueueMonitor\Controllers\ShowQueueMonitorController::class)->name('queue-monitor::index');

if (config('queue-monitor.ui.allow_deletion')) {
    Route::delete('monitors/{monitor}', \romanzipp\QueueMonitor\Controllers\DeleteMonitorController::class)->name('queue-monitor::destroy');
}

if (config('queue-monitor.ui.allow_purge')) {
    Route::delete('purge', \romanzipp\QueueMonitor\Controllers\PurgeMonitorsController::class)->name('queue-monitor::purge');
}

if (config('queue-monitor.ui.allow_retry')) {
    Route::get('retry/{job_id}', \romanzipp\QueueMonitor\Controllers\RetryJobsController::class)->name('queue-monitor::retry');
}
