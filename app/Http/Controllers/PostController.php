<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    function show($post_id)
    {
        $post = Post::query()->findOrFail($post_id);

        $respuesta = [
            'body' => [
                'post' => [
                    'id' => $post->id,
                    'title' => $post->title,
                    'short_content' => $post->short_content,
                    'owner' => $post->owner,
                    'users' => $post->writers(),
                    'comments' => $post->comments,
                ]
            ]
        ];

        return $respuesta;
    }
}
