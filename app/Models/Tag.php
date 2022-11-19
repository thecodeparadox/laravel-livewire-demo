<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * The users that belong to the role.
     */
    public function posts()
    {
        return $this->belongsToMany(Posts::class);
    }
}
