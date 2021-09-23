<?php

namespace romanzipp\QueueMonitor\Controllers;

use Illuminate\Http\Request;
use romanzipp\QueueMonitor\Models\Monitor;

class RetryJobsController
{
    /**
     * Retries job
     * 
     * For some reason automatic model binding not working here.
     * 
     * @param Request $request
     * @param $job_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, $job_id)
    {
        $job = Monitor::query()->find($job_id);
        
        $job->retry();

        return redirect()->route('queue-monitor::index');
    }
}
