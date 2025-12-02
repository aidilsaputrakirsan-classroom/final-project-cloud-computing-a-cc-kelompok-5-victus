<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ActivityLogger
{
    /**
     * Log an activity.
     *
     * @param  string  $action
     * @param  string|null  $description
     * @param  \Illuminate\Database\Eloquent\Model|null  $loggable
     * @param  \Illuminate\Http\Request|null  $request
     * @param  int|null  $userId
     * @return ActivityLog
     */
    public static function log(string $action, ?string $description = null, $loggable = null, ?Request $request = null, ?int $userId = null)
    {
        $userId = $userId ?? Auth::id();

        $data = [
            'user_id' => $userId,
            'action' => $action,
            'description' => $description,
            'ip_address' => $request?->ip() ?? null,
            'user_agent' => $request?->userAgent() ?? null,
            'loggable_type' => $loggable ? get_class($loggable) : null,
            'loggable_id' => $loggable ? ($loggable->getKey() ?? null) : null,
        ];

        return ActivityLog::create($data);
    }
}
