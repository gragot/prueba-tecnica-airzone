<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function writer() {
        return $this->hasMany(User::class, 'user');
    }

    public function posts() {
        return $this->belongsToMany(Post::class, 'comment_post', 'comment', 'blog');
    }
}
