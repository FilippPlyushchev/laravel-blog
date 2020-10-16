<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Get username.
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'author_id', 'id');
    }
}
