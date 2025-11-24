<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'featured_image',
        'status',
        'tags',
        'user_id',
        'category_id',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }

    /**
     * Scope a query to only published posts.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Get tags attribute as a Collection of Tag models.
     * Stored in DB as JSON array of tag IDs.
     */
    public function getTagsAttribute($value)
    {
        $ids = json_decode($value ?? '[]', true);
        if (!is_array($ids)) {
            $ids = [];
        }

        return Tag::whereIn('id', $ids)->get();
    }

    /**
     * Set tags attribute (accept array of ids) and store as JSON.
     */
    public function setTagsAttribute($value)
    {
        $ids = is_array($value) ? array_values($value) : [];
        $this->attributes['tags'] = json_encode($ids);
    }
}
