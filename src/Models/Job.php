<?php

namespace romanzipp\QueueMonitor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

/**
 * @class Job
 * @property array $payload
 * @property Carbon|null $reserved_at
 * @property Carbon|null $started_at
 * @property Carbon|null $created_at
 */
class Job extends Model {
    public $timestamps = false;

    protected $casts = [
        'payload' => 'array',
        'reserved_at' => 'datetime',
        'available_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('queue.connections.' . (Config::get('queue.default', 'database')) . '.table', 'jobs');
    }
}
