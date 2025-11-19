<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Relasi agar Tag bisa tahu dia dipakai di Post mana saja
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    // Route model binding key (agar url pakai slug bukan id)
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
