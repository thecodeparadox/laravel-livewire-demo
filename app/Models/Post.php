<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    /**
     * Every post has one author
     *
     * @return HasOne
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get Tags as an array
     *
     * @return Attribute
     */
    public function tags(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? json_decode($value) : [],
            set: fn ($value) => is_array($value) ? json_encode($value) : null
        );
    }
}
