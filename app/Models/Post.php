<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Comment[] comments
 * @property User owner
 * @property User[] writers
 */
class Post extends Model
{
    use HasFactory;

    public function getForeignKey()
    {
        return 'blog';
    }

    public function category() {
        return $this->belongsToMany(Category::class, 'category_post', 'blog', 'category');
    }

    public function comments() {
        return $this->belongsToMany(Comment::class, 'comment_post', 'blog', 'comment');
    }

    public function owner() {
        return $this->belongsTo(User::class, 'user');
    }

    /**
     * @return User[]
     */
    public function writers() {
        return User::whereIn('id', $this->comments->pluck('user')->toArray())->get();
    }
}
