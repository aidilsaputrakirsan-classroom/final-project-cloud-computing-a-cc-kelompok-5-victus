<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',
        'description',
        'ip_address',
        'user_agent',
        'loggable_type',
        'loggable_id',
    ];

    /**
     * The user who performed the action (nullable for system actions).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The model that the activity refers to (polymorphic).
     */
    public function loggable()
    {
        return $this->morphTo();
    }
}
