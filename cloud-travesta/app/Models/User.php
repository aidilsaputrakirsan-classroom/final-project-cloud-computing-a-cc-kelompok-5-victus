<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Atribut yang dapat diisi secara mass assignment
     */
    protected $fillable = [
        'name',        // Nama admin
        'email',       // Email untuk login
        'password',    // Password ter-hash
        'avatar',      // Path ke avatar image
        'is_active',   // Status aktif admin
    ];

    /**
     * Atribut yang disembunyikan dari serialization
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting atribut ke tipe data yang sesuai
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
    ];

    /**
     * Relationship: Admin memiliki banyak posts
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Accessor: Mendapatkan URL penuh untuk avatar
     */
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }

        // Default avatar menggunakan Gravatar
        return 'https://www.gravatar.com/avatar/' . md5(strtolower($this->email)) . '?d=mp&s=150';
    }

    /**
     * Static method: Mendapatkan user admin tunggal
     */
    public static function admin()
    {
        return self::first(); // Asumsi hanya 1 admin di sistem
    }
}
