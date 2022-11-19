<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    /**
     * Every post has one author
     *
     * @return HasOne
     */
    public function author(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * The roles that belong to the user.
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function shortContent(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attrs) => Str::limit($attrs['content'], 150)
        );
    }
}
