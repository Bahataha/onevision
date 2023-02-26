<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function getAuthor(int $id)
    {
        return Post::find($id);
    }

    public function create(int $id)
    {
        return Post::create([
            'id' => $id,
            'author_name' => auth()->user()->name
        ]);
    }
}
